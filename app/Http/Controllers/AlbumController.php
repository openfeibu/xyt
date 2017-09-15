<?php
namespace Hifone\Http\Controllers;

use Auth;
use Hifone\Models\User;
use Hifone\Models\Album;
use Hifone\Models\AlbumPhoto;
use Hifone\Commands\Album\AddAlbumCommand;
use Hifone\Commands\Album\UploadAlbumPhotoCommand;
use DB;
use Input;
use Cache;
use Redirect;
use Validator;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use AltThree\Validator\ValidationException;
use Hifone\Events\Album\AlbumPhotoWasUploadedEvent;

class AlbumController extends Controller
{

	public function __construct()
    {
	    parent::__construct();
        $this->middleware('auth',['except' => ['uploadCommonHandle']]);
		$this->title = '相册';
    }
    public function store ()
    {
	    $AlbumData = Input::get();
	    $rules = [
	    	'name' 		=> 'required|unique:albums,name,NULL,id,user_id,'.Auth::user()->id,
	    	'desc'		=> 'string',
	        //'theme'		=> 'int',
	    ];
	    $message = [
	    	'name.unique' => '已存在该相册',
	    ];
	    $validator = Validator::make($AlbumData,$rules,$message);
	    if($validator->errors()->first()){
		    return [
				'code' => 201,
				'message' => $validator->errors()->first(),
            ];
		}
        $album = dispatch(new AddAlbumCommand(
            $AlbumData['name'],
            $AlbumData['desc'],
            //$AlbumData['theme'],
            Auth::user()->id
        ));

        return [
			'code' => 200,
			'message' => '提交成功',
			'data' => $album
        ];
    }
    public function index(Request $request)
    {
	    $repository = app('repository');
	    $type = $request->get('type') ? $request->get('type') : '';
	    $order = $request->get('order') ? $request->get('order') : 'new';
		$album_photos = $repository->model(AlbumPhoto::class)->join('users', 'users.id', '=', 'album_photos.user_id');
	    if(in_array($type,['album','activity'])){
		    $album_photos = $album_photos->where('type',$type);
	    }
	    if($order == 'new'){
		    $album_photos = $album_photos->orderBy('album_photos.id','desc');
	    }
	    if($order == 'hot'){
		    $album_photos = $album_photos->orderBy('album_photos.score','desc');
	    }

	    $page_paramter = ['type'=>$type,'order'=>$order];

	    $album_photos = $album_photos->select('users.username', 'album_photos.*')->paginate(25)->appends($page_paramter);

		foreach( $album_photos as $key => $album_photo )
		{
			if($album_photo->type == 'album')
			{
				$album_photo->link = route('user.home',['uid'=>$album_photo['user_id']]);
				$album_photo->form = $album_photo['username'];
			}else if($album_photo->type == 'activity'){
				$album_photo->link = '';
				$album_photo->form = '';
			}

		}
		return $this->view('albums.index')->with('album_photos',$album_photos)
										  ->with('type',$type)
										  ->with('order',$order);
    }
    public function album (Request $request)
    {
		$order = $request->get('order') ? $request->get('order') : 'new';
	    $albums = app('repository')->model(Album::class)->recent()->forUser($request->user_id)->paginate(25);
    	foreach( $albums as $key => $album )
    	{
    		$album_photo =  app('repository')->model(AlbumPhoto::class)->where('album_id',$album->id)->recent()->forUser($request->user_id)->first();
    		$album->image = $album_photo ?  $album_photo->image : config('system_config.no_album_photo');
    	}

		return $this->view('albums.album')->with('albums',$albums)->with('order',$order);

    }
    public function albumAjax (Request $request)
    {
	    $user_id = $request->user_id;
    	$albums = app('repository')->model(Album::class)->recent()->forUser($user_id)->paginate(25);
    	if(!$albums){
			return [
				'html' => '没有更多数据了',
				'pageHtml' => '',
			];
		}
    	foreach( $albums as $key => $album )
    	{
    		$album_photo =  app('repository')->model(AlbumPhoto::class)->where('album_id',$album->id)->recent()->forUser($user_id)->first();
    		$album->image = $album_photo ?  $album_photo->image : config('system_config.no_album_photo');
    	}

		$html = view("users.albums")->with('albums',$albums)->__toString();
		$pageHtml = with(new \Hifone\Foundations\Pagination\CustomerPresenter($albums))->render();

		return [
			'html' => $html,
			'pageHtml' => $pageHtml,
		];
    }
    public function uploadCommon(Request $request)
    {
		$albums = app('repository')->model(Album::class)->recent()->forUser(Auth::id())->get();
    	foreach( $albums as $key => $album )
    	{
    		$album_photo =  app('repository')->model(AlbumPhoto::class)->where('album_id',$album->id)->recent()->forUser(Auth::id())->first();
    		$album->image = $album_photo ?  $album_photo->image : config('system_config.no_album_photo');
    	}
		$user_views = app('userRepository')->getUserViews(Auth::id(),12);
		$user_views_count = app('userRepository')->getUserViewsCount(Auth::id());
		$activity_id = isset($request->activity_id) ? intval($request->activity_id) : 0;
		return $this->view('albums.upload_common')->with('albums',$albums)->with('user_views',$user_views)->with('user_views_count',$user_views_count)
		->with('activity_id',$activity_id);
    }
    public function uploadCommonHandle()
    {
	    if(Auth::guest()){
		    return response('未登陆', 401);
	    }
	    $space_id = Cache::get('photo_space_id_'.Auth::id());
	    if ($file = Input::file('Filedata')) {
		    $album_id = Input::get('album_id');
		    $AlbumPhotoData = [
	            'album_id' => $album_id,
		    ];
		    $rules = [
		    	'album_id' 		=> 'exists:albums,id,id,'.$album_id,
		    ];
		    $message = [
		    	'album_id.exists' => '不存在该相册',
		    ];
		    $validator = Validator::make($AlbumPhotoData,$rules,$message);
		    if($validator->errors()->first()){
			    return [
					'code' => 201,
					'error' => $validator->errors()->first(),
	            ];
			}
			$album = app(Album::class)->where('id',$album_id)->first();
		    $folderName = '/uploads/album/'.'user_id_'.Auth::user()->id.'/'.'album_id_'.$album_id;
		    $data = app('imageService')->uploadImage($file,$folderName);
		    if($data['code'] != 200){
			    return $data;
			}
			$album_photo = AlbumPhoto::create([
	            'user_id'  => Auth::user()->id,
	            'album_id' => $album_id,
	            'space_id' => $space_id,
	            'image'    => $data['filename'],
	            'type'	   => 'album',
				'activity_id' => $album->activity_id,
        	]);
        	if(!$space_id){
	        	$space_id = app('spaceRepository')->syncToSpace('albumPhoto',  Auth::id(), $album_photo->id);
	        	Cache::put('photo_space_id_'.Auth::id(),$space_id,10);
        	}
        	AlbumPhoto::where('id',$album_photo->id)->update(['space_id' => $space_id]);

        	event(new AlbumPhotoWasUploadedEvent());

            $data['url'] = route('album.album_photos',['album_id'=>$album_id]);
			$album_photo_count = app(AlbumPhoto::class)->where('user_id',Auth::id())->count();
			if($album_photo_count >=3)
			{
				app('taskRepository')->store('photo');
			}
        } else {
	        $data['code'] = 201;
            $data['error'] = '请选择文件';
        }

        return $data;
    }
    public function album_photos ($album_id)
    {
	    Cache::forget('photo_space_id_'.Auth::id());
    	$album_photos =  app('repository')->model(AlbumPhoto::class)->where('album_id',$album_id)->recent()->paginate(25);
    	return $this->view('albums.album_photo')->with('album_photos',$album_photos);
    }
    public function show ($id)
    {
	    $photo = app('repository')->model(AlbumPhoto::class)->where('id',$id)->first();
	    $album = app('repository')->model(Album::class)->where('id',$photo->album_id)->first();
	    $last = app('repository')->model(AlbumPhoto::class)->where('album_id',$photo->album_id)->recent()->first();
		$photos = array();
	    $count = app('repository')->model(AlbumPhoto::class)->where('album_id',$photo->album_id)->count();
	    $photos[2] = $photo;
	    if($count > 5){
		    $less_now_count = app('repository')->model(AlbumPhoto::class)->where('album_id',$photo->album_id)->where('id','<=',$id)->count();
		    if($less_now_count < $count-1){
			    if($less_now_count == 1 ){
				    $photos[0] = app('repository')->model(AlbumPhoto::class)->where('album_id',$photo->album_id)->where('id','<',$last->id)->recent()->first();
				    $photos[1] = $last;

			    }else if($less_now_count == 2 ){
				    $photos[0] = $last;
				    $photos[1] = app('repository')->model(AlbumPhoto::class)->where('album_id',$photo->album_id)->first();
			    }
			    else{
				    $beforeObjs = app('repository')->model(AlbumPhoto::class)->where('album_id',$photo->album_id)->where('id','<',$id)->recent()->take(2)->get();
				    $k = 1;
				    foreach( $beforeObjs as $key => $beforeObj )
				    {
				    	$photos[$k] = $beforeObj;
				    	$k--;
				    }
			    }
			    $afterObjs =  app('repository')->model(AlbumPhoto::class)->where('album_id',$photo->album_id)->where('id','>',$id)->take(2)->get();
			    $k = 3;
			    foreach( $afterObjs as $key => $afterObj )
			    {
			    	$photos[$k] = $afterObj;
			    	$k++;
			    }
			}else{
				$beforeObjs = app('repository')->model(AlbumPhoto::class)->where('album_id',$photo->album_id)->where('id','<',$id)->recent()->take(2)->get();
			    $k = 1;
			    foreach( $beforeObjs as $key => $beforeObj )
			    {
			    	$photos[$k] = $beforeObj;
			    	$k--;
			    }
			    if($less_now_count == $count){
				    $afterObjs = app('repository')->model(AlbumPhoto::class)->where('album_id',$photo->album_id)->take(2)->get();
				    $k = 3;
				    foreach( $afterObjs as $key => $afterObj )
				    {
				    	$photos[$k] = $afterObj;
				    	$k++;
				    }
			    }
			    if($less_now_count == $count-1){
				    $photos[3] = $last;
				    $photos[4] = app('repository')->model(AlbumPhoto::class)->where('album_id',$photo->album_id)->first();
			    }
			}
	    }
	    else{
		    $photos = app('repository')->model(AlbumPhoto::class)->where('album_id',$photo->album_id)->get();
	    }
		if(is_array($photos))
		{
			ksort($photos);
		}

	    $previous =  app('repository')->model(AlbumPhoto::class)->where('id','<',$id)->recent()->first();
	    $next = app('repository')->model(AlbumPhoto::class)->where('id','>',$id)->first();
	    if(!$previous){
		    $previous = $last;
	    }
	    if(!$next){
		    $next = app('repository')->model(AlbumPhoto::class)->where('album_id',$photo->album_id)->first();
	    }
	    $user = User::findByUidOrFail($photo->user_id);
    	$this->breadcrumb->push([
				$user->username.'的主页' => route('album.index'),
                'TA的所有相册' => route('album.album',['user_id'=>$photo->user_id]),
                $album->name => route('album.show',$id),
				'查看图片' => ''
        ]);
        return $this->view('albums.show')->with('user',$user)
    							->with('photo',$photo)
    							->with('album',$album)
    							->with('photos',$photos)
    							->with('previous',$previous)
    							->with('next',$next);
    }
	public function delPhotos(Request $request)
	{
		$ids = Input::get('ids');
		app('repository')->model(AlbumPhoto::class)->whereIn('id',$ids)->where('user_id',Auth::id())->delete();
		return Redirect::back()->withSuccess('操作成功');
	}
	public function delAlbums(Request $request)
	{
		$ids = Input::get('ids');
		app('repository')->model(AlbumPhoto::class)->whereIn('album_id',$ids)->where('user_id',Auth::id())->delete();
		app('repository')->model(Album::class)->whereIn('id',$ids)->where('user_id',Auth::id())->delete();

		return Redirect::back()->withSuccess('操作成功');
	}
}
