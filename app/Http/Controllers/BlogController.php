<?php
namespace Hifone\Http\Controllers;

use Auth;
use DB;
use Input;
use Crypt;
use Cookie;
use Redirect;
use Validator;
use Hifone\Models\User;
use Hifone\Models\Blog;
use Hifone\Models\BlogDigg;
use Hifone\Models\BlogCategory;
use Illuminate\Http\Request;


class BlogController extends Controller
{
	public function __construct()
    {
	    parent::__construct();
		$this->title = '日志';
    }
    public function index (Request $request)
    {
	    $blog_user = Auth::user();
	    $where = array();
	    $cates =  '';
	    $cat_id = isset($request->cat_id) && !empty($request->cat_id) ? $request->cat_id : '';
	    $type = isset($request->type) ? $request->type : 'recommend';
	    if(isset($request->user_id) && !empty($request->user_id)){
		    $where['user_id'] =  $request->user_id;
		    $blog_user = User::findByUidOrFail($request->user_id);
		    $cates = app(BlogCategory::class)->forUser($request->user_id)->get();
		    $type = 'other';
		    $this->breadcrumb->push([
					$blog_user->username.'的主页' => route('user.home',$request->user_id),
	                'TA的所有日志' => route('blog.index',['user_id'=>$request->user_id])
	        ]);
	    }
	    if($cat_id){
		    $where['cat_id'] = $request->cat_id;
	    }
	    if($type == 'me'){
		    $cates = app(BlogCategory::class)->forUser(Auth::id())->get();
	    }
	    $blogs = app('blogRepository')->getBlogs($type,$where);
    	return $this->view('blog.index')
    				->with('blogs',$blogs)
    				->with('type',$type)
    				->with('cates',$cates)
    				->with('cat_id',$cat_id)
    				->with('blog_user',$blog_user);
    }
    public function create ()
    {
	    $cates = app(BlogCategory::class)->forUser(Auth::id())->get();
    	return $this->view('blog.create')->with('cates',$cates);
    }
    public function store ()
    {
    	$blog_data = Input::get();
    	$rules = [
			'title' => 'required|string|between:3,80',
			'body' => 'required|string',
			'friend' => 'required|integer|between:0,5',
	    ];
	    $validator = Validator::make($blog_data,$rules);
		if($validator->errors()->first()){
			return  Redirect::back()
			                ->withInput(Input::all())
			                ->withErrors($validator->errors());
		}
    	$cat_id = isset($blog_data['cat_id']) ? $blog_data['cat_id'] : 0;
    	if(strpos($cat_id, ':') !== false){
	    	$new_cat = explode(':',$cat_id);
	    	$cat = BlogCategory::where('name',trim($new_cat['1']))->first();
	    	if(!$cat){
		    	$blog_cat = BlogCategory::create([
					'name' => trim($new_cat['1']),
					'user_id' => Auth::id(),
		    	]);
		    	$cat_id = $blog_cat->id;
	    	}else{
		    	$cat_id = $cat->id;
	    	}
    	}
    	$blog = Blog::create([
			'cat_id' => intval($cat_id),
			'user_id' => Auth::id(),
			'title' => $blog_data['title'],
			'body' => $blog_data['body'],
			'body_original' => $blog_data['body_original'],
			'friend' => $blog_data['friend'],
			'password' => $blog_data['password'] ? password_hash($blog_data['password'], PASSWORD_BCRYPT) : '',
    	]);
    	//if(isset($blog_data['makefeed']) && $blog_data['makefeed']){
	    	$space_id = app('spaceRepository')->syncToSpace('blog',  Auth::id(), $blog->id);
	    	Blog::where('id',$blog->id)->update(['space_id' => $space_id ]);
    	//}

    	return Redirect::route('blog.show', [$blog->id])
            ->withSuccess(sprintf('%s %s', trans('hifone.awesome'), trans('hifone.success')));
    }
    public function show (Request $request)
    {
	    $id = $request->id;
	    $blog = app('repository')->model(Blog::class)->findOrFail($id);
	    $cookie = Cookie::make('user',$blog,30);
	    app('repository')->model(Blog::class)->where('id',$id)->increment('view_count');
	    $user = $blog->user;
		$this->breadcrumb->push([
				$user->username.'的主页' => route('user.home',['uid'=>$blog->user_id]),
                'TA的所有日志' => route('blog.index',['user_id'=>$blog->user_id]),
                $blog->title => '',
        ]);
        $hot_blogs = app('blogRepository')->hotBlogs();
        $new_blogs = app('blogRepository')->newBlogs();

		$blog_digg = BlogDigg::where('user_id',Auth::id())->where('blog_id',$id)->first();
		if($blog_digg){
			$digg_text = '取消点赞';
		}else{
			$digg_text = '点赞';
		}
    	return $this->view('blog.show')
    				->with('blog',$blog)
    				->with('user',$user)
    				->with('hot_blogs',$hot_blogs)
    				->with('new_blogs',$new_blogs)
					->with('digg_text',$digg_text);
    }

}
