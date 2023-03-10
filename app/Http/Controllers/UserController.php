<?php

namespace Hifone\Http\Controllers;

use Hifone\Models\Gift;
use AltThree\Validator\ValidationException;
use DB;
use Auth;
use Hash;
use Mail;
use Input;
use Session,Cookie;
use Redirect;
use Carbon\Carbon;
use Hifone\Models\User;
use Hifone\Models\Blog;
use Hifone\Models\Area;
use Hifone\Models\Vote;
use Hifone\Models\Space;
use Hifone\Models\Reply;
use Hifone\Models\Task;
use Hifone\Models\Thread;
use Hifone\Models\School;
use Hifone\Models\Packet;
use Hifone\Models\Activity;
use Hifone\Models\Identity;
use Hifone\Models\Location;
use Hifone\Models\Provider;
use Hifone\Models\EmailCode;
use Hifone\Models\UserDating;
use Hifone\Models\UserDetail;
use Hifone\Models\UserHappy;
use Hifone\Models\UserStandard;
use Hifone\Models\UserRealname;
use Hifone\Models\Activity_actors;
use Hifone\Models\UserEducation;
use Hifone\Models\UserView;
use Hifone\Models\ActivityCategory;
use Illuminate\Support\Facades\View;
use Hifone\Hashing\PasswordHasher;
use Hifone\Commands\Follow\AddFollowCommand;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Http\Request;
use Validator;

class UserController extends Controller
{
	protected $hasher;

    public function __construct(PasswordHasher $hasher)
    {
	    parent::__construct();
	    $this->hasher = $hasher;
        $this->middleware('auth',['except' => ['checkLogin','checkEmail','checkRegisterParam','loadSchool','dynamic','validateEmail','registerMobile','registerValidateMobile','forgetPassword','forgetPasswordMobile','forgetPasswordMobileNext','forgetPasswordNextSubmit','forgetPasswordEmailNext','avatarStore','invitationShow']]);
    }
	public function registerAvatar ()
	{
		return $this->view('auth.register2')->with('user',Auth::user());
	}
	public function register_last()
	{
		$users = app('userRepository')->getWeekstarUsers(0,16);
		return $this->view('auth.register3')->with('users',$users);
	}
    public function index()
    {
        $users = User::recent()->take(48)->get();

        return $this->view('users.index')
            ->withUsers($users);
    }
	public function home ($uid)
	{
		return $this->show(User::findByUidOrFail($uid));
	}
    public function show(User $user)
    {
		if(Auth::id() != $user->id ){
		/*	$finish_tasks = app('taskRepository')->getTasks(Auth::id(),'finish');
	        $count = app(Task::class)->count();
			if(count($finish_tasks) < $count){
				return Redirect::route('task.index')
	                ->withErrors(['?????????????????????????????????????????????TA?????????']);
			}*/
			$task_user_profile = app('taskRepository')->getTaskUser(['task_id' => '5','user_id' => Auth::id()]);
			if(!$task_user_profile){
				$basic_data = app('userRepository')->basic_data_status(User::findByUidOrFail(Auth::id()));
				if($basic_data['status']){
					app('taskRepository')->store('profile');
				}else{
					return Redirect::route('task.index')
		                ->withErrors(['?????????????????????????????????????????????TA?????????']);
				}
			}
		    $is_view = app('repository')->model(UserView::class)->where('view_user_id',Auth::id())->where('user_id',$user->id)->first();
		    if(!$is_view){
			    app('repository')->model(User::class)->where('id',$user->id)->increment('view_count');
			    UserView::create([
		            'user_id'  => $user->id,
		            'view_user_id' => Auth::id(),
		    	]);
		    }
			$user->qq = handlePrivacy($user->qq);
			$user->email = handlePrivacy($user->email);
			$user->weixin = handlePrivacy($user->weixin);
	    }
        $threads = Thread::forUser($user->id)->recent()->limit(10)->get();
        $replies = Reply::forUser($user->id)->recent()->limit(10)->get();

		$base_data = config('form_config.basic_data');
		$happy_data = config('form_config.happy_data');
		$detail_data = config('form_config.detail_data');
		$dating_data = config('form_config.dating_data');
		$standard_data = config('form_config.standard_data');
		$user_happy =  $user->happy;
		//var_dum($user_happy);exit;
		$user_dating = $user->dating;
		$user_detail = $user->detail;
		$user_standard = $user->standard;
		$followings = $user->following;
		foreach( $followings as $key => $following )
		{
			$following->avatar = User::findByUidOrFail($following->followable_id,['avatar_url'])->avatar;
		}

 		$page_paramter =  $var = [
        	'p' => 1,
        	'loadId' => 0,
        	'load_count' =>  4,
        	'type' => 'space',
        	'feed_type' => '',
        	'feed_key' => '',
        	'fgid' => 0,
        	'topic_id' => 0,
        	'gid' => 0,
        	'feedApp' => '',
        	'limitnums' => 5,
        	'showPage' => 1,
        	'app' => '',
        	'to_user_id' => $user->id,
			'showPage' => 1,
        ];
        $var['page_paramter'] = $page_paramter;

        $gift = Gift::get();

		$star = app('userRepository')->getStar($user);
		$role = app('userRepository')->getUserRole($user);


		$user_views = app('userRepository')->getUserViews($user->id);
        $user_viewings = app('userRepository')->getUserViewings($user->id);
		$blog_count = app('repository')->model(Blog::class)->forUser($user->id)->count();
		$activity_count = app('repository')->model(Activity::class)->where('user_id',$user->id)->count();
		$thread_count = app('repository')->model(Thread::class)->forUser($user->id)->count();
		$vote_count = app('repository')->model(Vote::class)->forUser($user->id)->count();
		$gift_count = DB::table('send_gift')->where('user_id' ,$user->id)->orWhere('to_user_id',$user->id)->count();
		$space_sql = Space::select('id')->where('is_audit',1);
		$map['user_id'] = $user->id;
		$map['type'] = 'post';
		$space_count = $space_sql->where($map)->count();
		$packet_users = Packet::select('users.avatar_url','users.username','packets.user_id','packets.created_at','packets.money')
											->join('users','users.id','=','packets.user_id')
											->where('packets.pay_status',1)
											->orderBy('packets.id','desc')
											->take(10)
											->get();
	//	$packet_users = handleUsers($packet_users)???
		$from_lang = Auth::id() == $user->id ? '??????' : 'TA???';

		if ($user->follows()->forUser(Auth::id())->count()) {
			$follow_text = "????????????";
        } else {
	        $follow_text = "?????????";
        }
        return $this->view('users.show')
            ->withUser($user)
            ->withThreads($threads)
            ->withReplies($replies)
            ->with('gifts',$gift)
            ->with('var',$var)
            ->with('base_data',$base_data)
            ->with('happy_data',$happy_data)
            ->with('detail_data',$detail_data)
            ->with('dating_data',$dating_data)
            ->with('standard_data',$standard_data)
            ->with('user_dating',$user_dating)
            ->with('user_happy',$user_happy)
            ->with('user_detail',$user_detail)
            ->with('user_standard',$user_standard)
            ->with('followings',$followings)
            ->with('user_views',$user_views)
            ->with('user_viewings',$user_viewings)
            ->with('blog_count',$blog_count)
            ->with('activity_count',$activity_count)
			->with('thread_count',$thread_count)
			->with('vote_count',$vote_count)
			->with('gift_count',$gift_count)
			->with('star',$star)
			->with('role',$role)
			->with('packet_users',$packet_users)
			->with('space_count',$space_count)
			->with('from_lang',$from_lang)
			->with('follow_text',$follow_text);
    }

    public function showByUsername($username)
    {
        return $this->show(User::findByUsernameOrFail($username));
    }

    public function edit(User $user)
    {
        $this->needAuthorOrAdminPermission($user->id);
        $providers = Provider::recent()->get();
        $ids = $user->identities()->pluck('provider_id')->all();

        return $this->view('users.edit')
            ->withProviders($providers)
            ->withTab(Input::get('tab'))
            ->withBindOauthIds($ids)
            ->withUser($user);
    }

    public function update(User $user)
    {
        $this->needAuthorOrAdminPermission($user->id);
        $data = Input::only('nickname', 'location', 'company', 'website', 'signature', 'bio', 'locale');
        try {
            if ($data['location']) {
                $location = Location::where('name', $data['location'])->first();
                if (!is_null($location)) {
                    $data['location_id'] = $location->id;
                }
            }

            app(User::class)->where('id',$user->id)->update($data);
        } catch (ValidationException $e) {
            return Redirect::route('user.edit')
                ->withInput(Input::all())
                ->withErrors($e->getMessageBag());
        }

        return Redirect::route('user.edit', $user->id)
            ->withSuccess(sprintf('%s %s', trans('hifone.awesome'), trans('hifone.success')));
    }

    public function destroy(User $user)
    {
        $this->needAuthorOrAdminPermission($user->id);
    }

    public function replies(User $user)
    {
        $replies = Reply::forUser($user->id)->recent()->paginate(15);

        return $this->view('users.replies')
            ->withUser($user)
            ->withReplies($replies);
    }

    public function threads(User $user)
    {
        $threads = Thread::forUser($user->id)->recent()->paginate(15);

        return $this->view('users.threads')
            ->withUser($user)
            ->withThreads($threads);
    }

    public function favorites(User $user)
    {
        $threads = $user->favoriteThreads()->paginate(15);

        return $this->view('users.favorites')
            ->withUser($user)
            ->withThreads($threads);
    }

    public function credits(User $user)
    {
        $credits = $user->credits()->paginate(15);

        return $this->view('users.credits')
            ->withUser($user)
            ->withCredits($credits);
    }

    public function city($name)
    {
        $location = Location::where('name', $name)->firstOrFail();
        $users = $location->users()->paginate(15);

        return $this->view('users.city')
            ->withLocation($location)
            ->withUsers($users);
    }

    public function blocking(User $user)
    {
        $user->is_banned = (!$user->is_banned);
        $user->save();

        return Redirect::route('users.show', $user->id);
    }

    public function unbind(User $user)
    {
        $this->needAuthorOrAdminPermission($user->id);
        $record = Identity::where('user_id', '=', $user->id)->where('provider_id', '=', Input::get('provider_id'))->first();

        $record ? $record->delete() : null;

        return Redirect::route('user.edit', $user->id)
            ->withSuccess('????????????');
    }

    public function avatarupdate()
    {
	    $input = Input::all();
    	$rules = [
			'avatar' => 'required|image' ,
	    ];
	    $messages = [
			'avatar.required' => '???????????????',
			'avatar.image' => '??????????????????'
	    ];

	    $validator = Validator::make($input,$rules,$messages);

	    if($validator->errors()->first()){
			return  Redirect::back()
			                ->withInput(Input::all())
			                ->withErrors($validator->errors());
		}

        $user_id = Auth::id();
        $originFile = Input::file('avatar');

        $path = ($user_id % 10).'/'.($user_id % 10).'/';
        $destinationPath = public_path().'/uploads/avatar/'.$path;
        $saveName = $user_id.'.jpg';

        $originFile->move($destinationPath, $saveName);
        $img = Image::make($destinationPath.'/'.$saveName);

        $img->resize(192, 192)
            ->encode('jpg')
            ->save();

        $img->resize(48, 48)
            ->encode('jpg')
            ->save($destinationPath.$user_id.'_small.jpg');
		$user = Auth::user();


        $user->avatar_url = '/uploads/avatar/'.$path.$user_id.'.jpg';
        $user->save();

		app('taskRepository')->store('avatar');
		// if(null !== Input::get('register_last'))
		// {
		// 	return Redirect::route('user.register_last');
		// }
        return Redirect::back()
            ->withSuccess('??????????????????');
    }


    protected function resetPassword()
    {
        $user = Auth::user();

        if (Hash::check(Input::only('old_password')['old_password'], $user->password)) {
            $password = Input::only('password')['password'];

            $password_confirmation = Input::only('password_confirmation')['password_confirmation'];

            if (!($password == $password_confirmation)) {
                return Redirect::back()
                    ->withInfo('?????????????????????????????????????????????, ???????????????.');
            } else {
                $user->password = Hash::make(Input::only('password')['password']);

                $user->save();

                return Redirect::back()
                    ->withSuccess('??????????????????!');
            }
        } else {
            return Redirect::back()
                ->withErrors(['??????????????????????????????, ???????????????.']);
        }
    }
    /* ???????????? */
    public function forgetPassword(Request $request)
    {
	    if(isset($request->dosubmit)){
		    if(isset($request->type) && $request->type == 'mobile')
		    {
			    $user = User::where('mobile',$request->mobile)->first(['id']);
			    if(!$user){
				    return Redirect::back()
                				->withWarning('???????????????????????????????????????');
			    }
			    return $this->view('auth.forget_password')->with('mobile',$request->mobile);
		    }
		    if(isset($request->type) && $request->type == 'email'){
			    $user = User::where('email',$request->email)->first(['id']);
			    if(!$user){
				    return Redirect::back()
                				->withWarning('?????????????????????????????????');
			    }
			    $status = app('userRepository')->send_email_hash($user->id,$request->email,'forget_password');

				if($status){
					return  $this->view('message.message2')
					                ->withTitle('????????????')
					                ->withContent('?????????????????????????????????Email?????????????????????????????????3??????????????????????????????');
				}else{
					return  Redirect::back()
					                ->withInput(Input::all())
					                ->withErrors(['??????????????????????????????????????????']);
				}
		    }
		    return Redirect::back()->withWarning('????????????');
	    }
    	return $this->view('auth.forget_password');
    }
    /*??????????????????????????????*/
    public function forgetPasswordMobile (Request $request)
    {
	    $data = $request->input();
	    $rules = [
	    	'mobile' => "required|regex:/^1[34578][0-9]{9}/",
	    ];
	    $message = [
	    	'mobile.regex' 		=> '?????????????????????',
	    	'mobile.required'	=> '????????????????????????',
	    ];

	    $validator = Validator::make($data,$rules,$message);
	    if($validator->errors()->first()){
			return [
				'code' => 201,
				'message' => $validator->errors()->first(),
            ];
		}
		$mobile = trim($data['mobile']);
		$user = app(User::class)->where('mobile',$mobile)->first(['id']);
		if(!$user){
			return [
				'code' => 201,
				'message' => '???????????????????????????????????????',
            ];
		}
		$result = app('smsRepository')->send($mobile,'forgetPasswordMobile');
		if($result['code'] == 200){
			return [
				'code' => 200,
				'veri_code' => Session::get('forgetPasswordMobilesms_code'),
				'message' => '??????????????????????????????????????????????????????',
            ];
		}
		else{
			return [
				'code' => 201,
				'message' => '?????????????????????????????????',
            ];
        }
    }
    public function forgetPasswordEmailNext (Request $request)
    {
    	$hash = empty($request->hash) ? '' : trim($request->hash);
	    if ($hash)
	    {
	        $id = app('userRepository')->email_hash('decode', $hash);
	        if ($id > 0)
	        {
	            $email_code = app(EmailCode::class)->where('id',$id)->first();
	            $user = app(User::class)->where('id',$email_code->user_id)->first(['username','email','email_status']);
	            Session::put('verified_email',$email_code->email);
	            return $this->view('auth.forget_password_next')->with('user',$user);
	        }
	         return  $this->view('message.message2')->with('title','????????????')->with('content','??????????????????????????????????????????');
	    }
	    return  $this->view('message.message2')->with('title','????????????')->with('content','??????????????????????????????????????????');
    }
    public function forgetPasswordMobileNext ()
    {
	    $mobile = Session::get('verified_mobile');
	    if($mobile){
		    $user = app(User::class)->where('mobile',$mobile)->first(['id','username']);
		    return $this->view('auth.forget_password_next')->with('user',$user);
	    }
    	$data = Input::get();
		$rules = [
	    	'mobile' => "required|regex:/^1[34578][0-9]{9}/",
	    	'code' => 'required'
	    ];
	    $message = [
	    	'mobile.regex' 		=> '?????????????????????',
	    	'mobile.required'	=> '????????????????????????',
	    	'code.required' => '?????????????????????',
	    ];

	    $validator = Validator::make($data,$rules,$message);
	    if($validator->errors()->first()){
			return  Redirect::back()
			                ->withInput(Input::all())
			                ->withErrors($validator->errors());
		}
		$mobile = trim($data['mobile']);
		$code = trim($data['code']);
	    $result = app('smsRepository')->checkCode('forgetPasswordMobile',$code,$mobile);
	    if($result['code'] == 200){
		    /*?????????????????????????????????*/
		    Session::put('verified_mobile',$mobile);
			$user = app(User::class)->where('mobile',$mobile)->first(['id','username']);
		    return $this->view('auth.forget_password_next')->with('user',$user);
	    }else{
		    return  Redirect::back()
			                ->withInput(Input::all())
			                ->withErrors($result['message']);
	    }
    }
    public function forgetPasswordNextSubmit ()
    {
	    $mobile = Session::get('verified_mobile');
	    $email = Session::get('verified_email');
	    if(!$mobile && !$email){
			return Redirect::to('/user/forgetPassword');
	    }
	    $user = app(User::class)->where('mobile',$mobile)->first(['id','username','salt']);
	    if($mobile){
		    $user = app(User::class)->where('mobile',$mobile)->first(['id','username','salt']);
	    }else if($email){
		    $user = app(User::class)->where('email',$email)->first(['id','username','salt']);
	    }
    	$password = Input::only('password')['password'];

        $password_confirmation = Input::only('password_confirmation')['password_confirmation'];

        if (!($password == $password_confirmation)) {
            return Redirect::back()
                ->withInfo('?????????????????????????????????????????????, ???????????????.');
        } else {
	        $user->password = $this->hashPassword(Input::only('password')['password'], $user->salt);

            $user->save();

            return Redirect::to('/auth/login')
                ->withSuccess('????????????????????????????????????!');
        }
    }
    public function checkLogin ()
    {

    }
    public function checkEmail (Request $request)
    {
	    $email = $request->email;
    	$user = User::where('email',$email)->first();
    	if($user){
	    	return '????????????????????????';
    	}
    	return 1;
    }
    public function checkRegisterParam (Request $request)
    {
    	$param_data = Input::get();
	    $rules = [
	    	'email' 		=> 'sometimes|email|unique:users,email',
	    	'username' 		=> 'sometimes|required|unique:users,username',
	    ];
	    $message = [
	    	'email.unique' 		=> '??????????????????',
	    	'username.unique' 	=> '??????????????????',
	    	'username.required'	=> '??????????????????',
	    ];
	    $validator = Validator::make($param_data,$rules,$message);
	    if($validator->errors()->first()){
		    return [
				'code' => 201,
				'message' => $validator->errors()->first(),
            ];
		}
		return [
			'code' => 200
		];
    }
    public function loadSchool (Request $request)
    {
    	$area_id = intval($request->pid) ? intval($request->pid) : 1;
    	//if(!($areas = S('areas_0'))){
	    	$areas = Area::where('pid',0)->get();
	    	S('areas_0', $areas,10);
    //	}
Area::getSchools($area_id);
    	$area = Area::where('id',$area_id)->first();

    	//if(!($schools = S('area_schools_'.$area_id))){
	    	$schools = $area->schools;
	    	S('area_schools_'.$area_id, $schools,10);
    	//}

    	return  $this->view('users.loadschool')
    		->with('area_id',$area_id)
            ->withAreas($areas)
            ->withSchools($schools)->render();
    }
    public function base (Request $request)
    {
	    $this->breadcrumb->push([
				'????????????' => route('user.home',['uid'=>Auth::id()]),
                '????????????' => route('profile.base',['uid'=>Auth::id()])
        ]);
        $user = Auth::user();

		$realname = DB::table('user_realnames')->where('user_id',$user->id)->where('status',1)->orderBy('id','desc')->first();

		$user->realname = $realname ? $realname->realname : '';

		$data = $user->toArray();

        $base_data = config('form_config.basic_data');
    	return  $this->view('users.profile.base')->with('user',$user)->with('base_data',$base_data)->with('data',$data);
    }
    public function baseUpdate (Request $request)
    {
		$input = Input::get();
		if($request->nextsubmit)
		{
			$rules = [
		    	'school_id' => 'required|numeric|exists:schools,id',
		    	'school' => 'required',
		    	'city' => 'required|integer|min:1|exists:areas,id',
		    	'work' => 'required|string',
		    	'industry' => 'required|string',
				'blood' => 'required|integer|min:1',
				'home_city' => 'required|integer|min:1|exists:areas,id',
				'height' => 'required|integer|min:1',
				'weight' => 'required|integer|min:1',
				'bodytype' => 'required|integer|min:1',
				'income' => 'required|integer|min:1',
				'house' => 'required|integer|min:1',
				'industry' => 'required',
				'work' => 'required',
				'minority' => 'required|integer|min:1',
				'religion' => 'required|integer|min:1',
				'smoke' => 'required|integer|min:1',
				'drink' => 'required|integer|min:1',
				'qq' => 'required|min:1',
				'weixin' => 'required|min:1',
		    ];
		    $messages = [
		    	'school.required' => '????????????',
		    	'school_id.exists' => '??????????????????',
		    	'city.min' => '???????????????',
		    	'city.exists' => '???????????????????????????',
		    	'work.required' => '????????????',
		    	'industry.required' => '????????????',
				'blood.min' => '????????????',
				'home_city.min' => '????????????',
				'city.exists' => '????????????????????????',
				'height.min' => '????????????',
				'weight.min' => '????????????',
				'bodytype.min' => '????????????',
				'income.required' => '????????????',
				'income.min' => '????????????',
				'house.min' => '??????????????????',
				'industry.required' => '????????????',
				'work.required' => '????????????',
				'minority.min' => '????????????',
				'religion.min' => '????????????',
				'smoke.min' => '??????????????????',
				'drink.min' => '??????????????????',
				'qq.min' => 'QQ??????',
				'weixin.min' => '????????????',
		    ];
			$url = route('profile.standard');
		}
		else{
			$rules = [
		    	'school_id' => 'required|numeric|exists:schools,id',
		    	'school' => 'required',
		    	'city' => 'required|integer|min:1|exists:areas,id',
		    	'work' => 'required|string|',
		    	'industry' => 'required|string|',
		    ];
		    $messages = [
		    	'school.required' => '????????????',
		    	'school_id.exists' => '??????????????????',
		    	'city.min' => '???????????????',
		    	'city.exists' => '??????????????????',
		    	'work.required' => '????????????',
		    	'industry.required' => '????????????',
		    ];
			$url = route('profile.base');
		}
//var_dump($input);exit;
	    $user = Auth::user();
	    $data = $user->toArray();
		$validator = Validator::make($input,$rules,$messages);
		if($validator->errors()->first()){
			foreach( $data as $key => $value )
			{
				if(isset($input[$key])&&$input[$key]){
					$data[$key] = $input[$key] ;
				}
			}
			return  Redirect::back()
			                ->withInput(Input::all())
			                ->withUser($user)
			                ->with('data',$data)
			                ->withErrors($validator->errors());
		}
		$basic_data = config('form_config.basic_data');
		$basic_data_key = array_keys($basic_data);
		foreach( $input as $key => $value )
		{
			if(!in_array($key,$basic_data_key)){
				unset($input[$key]);
			}
		}
	   	User::where('id',Auth::id())->update($input);
	   	$user = User::findByUidOrFail(Auth::id());
	   	$data = $user->toArray();
		$basic_data = app('userRepository')->basic_data_status($user);
		if($basic_data['status']){
			app('taskRepository')->store('profile');
			return Redirect::to($url)
	                ->withUser($user)
	                ->withSuccess('??????????????????????????????????????????');
		}

	   	return Redirect::to($url)
                ->withUser($user)
                ->withSuccess('????????????????????????');
    }
    public function standard (Request $request)
    {
	    $this->breadcrumb->push([
				'????????????' => route('user.home',['uid'=>Auth::id()]),
                '????????????' => route('profile.base',['uid'=>Auth::id()])
        ]);
        //$user = User::findByUidOrFail(Auth::id());

        $user_standard = UserStandard::findByUid(Auth::id());

		$data = $user_standard ? $user_standard->toArray() : array();

		$standard_data = config('form_config.standard_data');

		$standard_data_key = array_keys($standard_data);

		if(!$user_standard)
		{
			foreach($standard_data_key as $key => $value )
			{
				$data[$value] = '';
			}
		}

    	return  $this->view('users.profile.standard')->with('standard_data',$standard_data)->with('data',$data);
    }
    public function standardUpdate (Request $request)
    {
	    $input = Input::get();
		if($request->nextsubmit)
		{
			/*
			$rules = [
		    	'opcity' => 'required|integer|min:1|exists:areas,id',
		    	'opage' => 'required|integer|min:1',
				'opage2' => 'required|integer|min:1',
				'opheight' => 'required|integer|min:1',
				'opheight2' => 'required|integer|min:1',
		    	'opeducation' => 'required|integer|min:1',
				'opincome' => 'required|integer|min:1',
				'opwork' => 'required',
				'opmarriage' => 'required|integer|min:1',
				'opsmoke' => 'required|integer|min:1',
				'opdrink' => 'required|integer|min:1',
		    ];
		    $messages = [
		    	'opcity.min' => '???????????????',
		    	'opcity.exists' => '??????????????????',
		    	'opage.min' => '????????????',
				'opage2.min' => '????????????',
				'opheight.min' => '????????????',
				'opheight2.min' => '????????????',
		    	'opeducation.min' => '????????????',
				'opincome.min' => '???????????????',
				'opwork.required' => '????????????',
				'opmarriage.min' => '??????????????????',
				'opsmoke.min' => '??????????????????',
				'opdrink.min' => '??????????????????',
		    ];
			$validator = Validator::make($input,$rules,$messages);
			if($validator->errors()->first()){
				return  Redirect::back()
				                ->withInput(Input::all())
				                ->withErrors($validator->errors());
			}
			*/
			$url = route('profile.dating');
		}else{
			$url = route('profile.standard');
		}
	    $standard_data = config('form_config.standard_data');
		$standard_data_key = array_keys($standard_data);
		foreach( $input as $key => $value )
		{
			if(!in_array($key,$standard_data_key)){
				unset($input[$key]);
			}
		}
    	$user_standard = UserStandard::findByUid(Auth::id());
    	if(!$user_standard){
	    	$input['user_id'] = Auth::id();
	    	UserStandard::create($input);
    	}else{
	    	UserStandard::where('user_id',Auth::id())->update($input);
    	}
    	return Redirect::to($url)
                ->withSuccess('????????????');
    }
    public function dating ()
    {
    	$this->breadcrumb->push([
				'????????????' => route('user.home',['uid'=>Auth::id()]),
                '????????????' => route('profile.base',['uid'=>Auth::id()])
        ]);
        $user_dating = UserDating::findByUid(Auth::id());
        $aboutme = $user_dating ? $user_dating->aboutme : '';
    	return  $this->view('users.profile.dating')->with('aboutme',$aboutme);
    }
    public function datingUpdate (Request $request)
    {
	    $input = Input::get();
		if($request->nextsubmit)
		{
			/*
			$rules = [
		    	'aboutme' => 'required',
		    ];
		    $messages = [
		    	'aboutme.required' => '??????????????????',
		    ];
			$validator = Validator::make($input,$rules,$messages);
			if($validator->errors()->first()){
				return  Redirect::back()
				                ->withInput(Input::all())
				                ->withErrors($validator->errors());
			}*/
			$url = route('profile.detail');
		}else{
			$url = route('profile.dating');
		}
	    if(!isset($input['aboutme']))
	    {
		    return Redirect::back()
                ->withErrors(['????????????']);
	    }
	    $user_dating = UserDating::findByUid(Auth::id());
	    if(!$user_dating){
		    $data['user_id'] = Auth::id();
		    $data['aboutme'] = $input['aboutme'];
	    	UserDating::create($data);
	    }else{
		    UserDating::where('user_id',Auth::id())->update(['aboutme' =>$input['aboutme'] ]);

	    }
	    return Redirect::to($url)
                ->withSuccess('????????????????????????');
	}
	public function detail ()
	{
		$this->breadcrumb->push([
				'????????????' => route('user.home',['uid'=>Auth::id()]),
                '????????????' => route('profile.base',['uid'=>Auth::id()])
        ]);

		$user_detail  = UserDetail::findByUid(Auth::id());

		$data = $user_detail ? $user_detail->toArray() : array();

		$detail_data = config('form_config.detail_data');

		$detail_data_key = array_keys($detail_data);

		if(!$user_detail)
		{
			foreach($detail_data_key as $key => $value )
			{
				$data[$value] = '';
			}
		}
    	return  $this->view('users.profile.detail')->with('data',$data);
	}
	public function detailUpdate (Request $request)
	{
		$input = Input::get();
		if($request->nextsubmit)
		{
			/*
			$rules = [
		    	'nanwang' => 'required',
				'gexin' => 'required',
				'xingrong' => 'required',
				'youshi' => 'required',
				'hope' => 'required',
				'trainwith' => 'required',
				'interest' => 'required',
				'movie' => 'required',
				'tv' => 'required',
				'music' => 'required',
				'game' => 'required',
				'sport' => 'required',
				'idol' => 'required',
				'motto' => 'required',
				'wish' => 'required',
				'intro' => 'required',
		    ];
		    $messages = [
		    	'nanwang.required' => '?????????????????????',
				'gexin.required' => '??????????????????',
				'xingrong.required' => '?????????????????????',
				'youshi.required' => '??????????????????',
				'hope.required' => '???????????????TA??????',
				'trainwith.required' => '??????????????????',
				'interest.required' => '??????????????????',
				'book.required' => '?????????????????????',
				'movie.required' => '?????????????????????',
				'tv.required' => '?????????????????????',
				'music.required' => '?????????????????????',
				'game.required' => '?????????????????????',
				'sport.required' => '?????????????????????',
				'idol.required' => '????????????',
				'motto.required' => '???????????????',
				'wish.required' => '??????????????????',
				'intro.required' => '??????????????????',
		    ];
			$validator = Validator::make($input,$rules,$messages);
			if($validator->errors()->first()){
				return  Redirect::back()
				                ->withInput(Input::all())
				                ->withErrors($validator->errors());
			}*/
			$url = route('profile.happy');
		}else{
			$url = route('profile.detail');
		}
	    $detail_data = config('form_config.detail_data');
		$detail_data_key = array_keys($detail_data);
		foreach( $input as $key => $value )
		{
			if(!in_array($key,$detail_data_key)){
				unset($input[$key]);
			}
		}
    	$user_detail = UserDetail::findByUid(Auth::id());
    	if(!$user_detail){
	    	$input['user_id'] = Auth::id();
	    	UserDetail::create($input);
    	}else{
	    	UserDetail::where('user_id',Auth::id())->update($input);
    	}
    	return Redirect::to($url)
                ->withSuccess('????????????????????????');
	}
	public function happy ()
	{
		$this->breadcrumb->push([
				'????????????' => route('user.home',['uid'=>Auth::id()]),
                '????????????' => route('profile.base',['uid'=>Auth::id()])
        ]);

		$user_happy  = UserHappy::findByUid(Auth::id());

		$data = $user_happy ? $user_happy->toArray() : array();

		$happy_data = config('form_config.happy_data');

		$happy_data_key = array_keys($happy_data);

		if(!$user_happy)
		{
			foreach($happy_data_key as $key => $value )
			{
				$data[$value] = '';
			}
		}
    	return  $this->view('users.profile.happy')->with('happy_data',$happy_data)->with('data',$data);
	}
	public function happyUpdate ()
	{
		$input = Input::get();
	    $happy_data = config('form_config.happy_data');
		$happy_data_key = array_keys($happy_data);
		foreach( $input as $key => $value )
		{
			if(!in_array($key,$happy_data_key)){
				unset($input[$key]);
			}
		}
    	$user_happy = UserHappy::findByUid(Auth::id());
    	if(!$user_happy){
	    	$input['user_id'] = Auth::id();
	    	UserHappy::create($input);
    	}else{
	    	UserHappy::where('user_id',Auth::id())->update($input);
    	}
    	return Redirect::back()
                ->withSuccess('????????????????????????');
	}
	public function avatar ()
	{
		$this->breadcrumb->push([
				'????????????' => route('user.home',['uid'=>Auth::id()]),
                '????????????' => route('profile.base',['uid'=>Auth::id()])
        ]);
		$user = User::findByUidOrFail(Auth::id(),['avatar_url']);
		return  $this->view('users.setting.avatar')->with('user',$user);
	}
	public function spaces ()
	{
		$content = app('spaceRepository')->getData($var, '_FeedList');
	}
	public function identifyMobile (Request $request)
	{
		$this->breadcrumb->push([
				'????????????' => route('user.home',['uid'=>Auth::id()]),
                '????????????' => ''
        ]);
		$user = User::findByUidOrFail(Auth::id(),['mobile']);
		if(isset($request->type) && $request->type == 'edit'){
			return  $this->view('users.identify.mobile_edit')->with('user',$user);
		}
		return  $this->view('users.identify.mobile')->with('user',$user);
	}

	public function activityMobile (Request $request)
	{
		$data = $request->input();
	    $rules = [
	    	'mobile' => "required|regex:/^1[34578][0-9]{9}/",
	    ];
	    $message = [
	    	'mobile.regex' 		=> '?????????????????????',
	    	'mobile.required'	=> '????????????????????????',
	    ];

	    $validator = Validator::make($data,$rules,$message);
	    if($validator->errors()->first()){
			return [
				'code' => 201,
				'message' => $validator->errors()->first(),
            ];
		}
		$mobile = trim($data['mobile']);
		$user = app(User::class)->where('mobile',$mobile)->first(['id']);
		if($user){
			return [
				'code' => 201,
				'message' => '?????????????????????',
            ];
		}
		$result = app('smsRepository')->send($mobile,'changeMobile');
		if($result['code'] == 200){
			return [
				'code' => 200,
				'message' => '??????????????????????????????????????????????????????',
            ];
		}
		else{
			return [
				'code' => 201,
				'message' => '?????????????????????????????????',
            ];
		}

	}
	public function validateMobile ()
	{
		$data = Input::get();
		$rules = [
	    	'mobile' => "required|regex:/^1[34578][0-9]{9}/",
	    	'code' => 'required'
	    ];
	    $message = [
	    	'mobile.regex' 		=> '?????????????????????',
	    	'mobile.required'	=> '????????????????????????',
	    	'code.required' => '?????????????????????',
	    ];

	    $validator = Validator::make($data,$rules,$message);
	    if($validator->errors()->first()){
			return  Redirect::back()
			                ->withInput(Input::all())
			                ->withErrors($validator->errors());
		}
		$mobile = trim($data['mobile']);
		$code = trim($data['code']);
	    $result = app('smsRepository')->checkCode('changeMobile',$code,$mobile);
	    if($result['code'] == 200){
		    app(User::class)->where('id',Auth::id())->update(['mobile' => $result['mobile']]);
		   	return Redirect::route('identify.mobile')->withSuccess(['??????????????????']);
	    }else{
		    return  Redirect::back()
			                ->withInput(Input::all())
			                ->withErrors($result['message']);
	    }
	}
	public function registerMobile (Request $request)
	{
		$data = $request->input();
	    $rules = [
	    	'mobile' => "required|regex:/^1[34578][0-9]{9}/",
	    ];
	    $message = [
	    	'mobile.regex' 		=> '?????????????????????',
	    	'mobile.required'	=> '????????????????????????',
	    ];

	    $validator = Validator::make($data,$rules,$message);
	    if($validator->errors()->first()){
			return [
				'code' => 201,
				'message' => $validator->errors()->first(),
            ];
		}
		$mobile = trim($data['mobile']);
		$user = app(User::class)->where('mobile',$mobile)->first(['id']);
		if($user){
			return [
				'code' => 201,
				'message' => '?????????????????????',
            ];
		}
		$result = app('smsRepository')->send($mobile,'registerMobile');
		if($result['code'] == 200){
			return [
				'code' => 200,
				'veri_code' => Session::get('registerMobilesms_code'),
				'message' => '??????????????????????????????????????????????????????',
            ];
		}
		else{
			return [
				'code' => 201,
				'message' => '?????????????????????????????????',
            ];
		}
	}
	public function registerValidateMobile ()
	{
		$data = Input::get();
		$rules = [
	    	'mobile' => "required|regex:/^1[34578][0-9]{9}/",
	    	'code' => 'required'
	    ];
	    $message = [
	    	'mobile.regex' 		=> '?????????????????????',
	    	'mobile.required'	=> '????????????????????????',
	    	'code.required' 	=> '?????????????????????',
	    ];

	    $validator = Validator::make($data,$rules,$message);
	    if($validator->errors()->first()){
			return [
				'code' => 200,
				'message' => $validator->errors()->first(),
		    ];
		}
		$mobile = trim($data['mobile']);
		$code = trim($data['code']);
	    $result = app('smsRepository')->checkCode('registerMobile',$code,$mobile);
	    if($result['code'] == 200){
		    app(User::class)->where('id',Auth::id())->update(['mobile' => $result['mobile']]);
		    return [
				'code' => 200,
				'message' => '????????????',
		    ];

	    }else{
		    return [
				'code' => 201,
				'message' => $result['message'],
		    ];
	    }
	}

	public function identifyEmail (Request $request)
	{
		$this->breadcrumb->push([
				'????????????' => route('user.home',['uid'=>Auth::id()]),
                '????????????' => ''
        ]);
		$user = User::findByUidOrFail(Auth::id(),['email','email_status']);
		if(isset($request->type) && $request->type == 'edit'){
			return  $this->view('users.identify.email_edit')->with('user',$user);
		}
		return  $this->view('users.identify.email')->with('user',$user);
	}
	public function activityEmail ()
	{
		$data = Input::get();
	    $rules = [
	    	'email' 		=> 'required|email',
	    ];
	    $message = [
	    	'email.email' 		=> '?????????????????????',
	    	'email.required'	=> '??????????????????',
	    ];

	    $validator = Validator::make($data,$rules,$message);
	    if($validator->errors()->first()){
			return  Redirect::back()
			                ->withInput(Input::all())
			                ->withErrors($validator->errors());
		}
		$email = trim($data['email']);
		$user = app(User::class)->where('email',$email)->where('email_status',1)->first(['id']);
		if($user){
			return  Redirect::back()
			                ->withInput(Input::all())
			                ->withErrors(['??????????????????????????????????????????????????????????????????????????????']);
		}

		$status = app('userRepository')->send_email_hash(Auth::id(),$email);

		if($status){
			return  Redirect::back()
			                ->withInput(Input::all())
			                ->withSuccess(['?????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????']);
		}else{
			return  Redirect::back()
			                ->withInput(Input::all())
			                ->withErrors(['??????????????????????????????????????????']);
		}
	}
	public function validateEmail (Request $request)
	{
		$hash = empty($request->hash) ? '' : trim($request->hash);
	    if ($hash)
	    {
	        $id = app('userRepository')->email_hash('decode', $hash);
	        if ($id > 0)
	        {
	            $email_code = app(EmailCode::class)->where('id',$id)->first();
	            $user = app(User::class)->where('id',$email_code->user_id)->first(['username','email','email_status']);
	            if($user->email == $email_code->email && $user->email_status == 1){
		            return  $this->view('message.message')->with('title','????????????')->with('content','????????????????????????????????????????????????????????????????????????????????????????????????');
	            }
	            app(User::class)->where('id',$email_code->user_id)->update(['email_status' => 1,'email' => $email_code->email]);
				app('taskRepository')->store('email');
	            return  $this->view('message.message')->with('title','????????????')->with('content','????????????????????????????????????');
	        }
	         return  $this->view('message.message')->with('title','????????????')->with('content','??????????????????????????????????????????');
	    }
	    return  $this->view('message.message')->with('title','????????????')->with('content','??????????????????????????????????????????');
	}
	public function identifyName ()
	{
		$this->breadcrumb->push([
				'????????????' => route('user.home',['uid'=>Auth::id()]),
                '????????????' => ''
        ]);
		$user = User::findByUidOrFail(Auth::id(),['avatar_url']);
		$real_name = app(UserRealname::class)->whereIn('status',['0','1'])->forUser(Auth::id())->recent()->first();
		return  $this->view('users.identify.name')->with('user',$user)->with('real_name',$real_name);
	}
	public function identifyNameStore ()
	{
		$input = Input::all();
    	$rules = [
    		'realname' => 'required',
			'usercard' => 'required|image|max:512000' ,
	    ];
	    $messages = [
	    	'realname.required' => '??????????????????',
			'usercard.required' => '???????????????',
			'usercard.image' => '??????????????????',
			'usercard.max' => '????????????500KB',
	    ];

	    $validator = Validator::make($input,$rules,$messages);

	    if($validator->errors()->first()){
			return  Redirect::back()
			                ->withInput(Input::all())
			                ->withErrors($validator->errors());
		}
		$file = Input::file('usercard');
		$folderName = '/uploads/realname/'.'user_id_'.Auth::user()->id;
		$data = app('imageService')->uploadImage($file,$folderName);
		if($data['code'] != 200){
		    return  Redirect::back()
			                ->withInput(Input::all())
			                ->withErrors($data['error']);
		}
		$user_name = UserRealname::create([
            'user_id'  => Auth::user()->id,
            'realname' => Input::get('realname'),
            'usercard' => $data['filename'],
            'status'   => 0,
    	]);
    	return Redirect::back()
                ->withSuccess('????????????????????????????????????');
	}
	public function identifyEducation (Request $request)
	{
		$this->breadcrumb->push([
				'????????????' => route('user.home',['uid'=>Auth::id()]),
                '????????????' => ''
        ]);
		$user = User::findByUidOrFail(Auth::id(),['avatar_url']);
		$user_education = app(UserEducation::class)->forUser(Auth::id())->recent()->first();
		$attr = isset($request->attr) ? $request->attr : '';
		return  $this->view('users.identify.education')->with('user',$user)->with('user_education',$user_education)->with('attr',$attr);
	}
	public function identifyEducationStore ()
	{
		$input = Input::all();
    	$rules = [
			'image' => 'required|image|max:512000' ,
	    ];
	    $messages = [
			'image.required' => '???????????????',
			'image.image' => '??????????????????',
			'image.max' => '????????????500KB',
	    ];

	    $validator = Validator::make($input,$rules,$messages);

	    if($validator->errors()->first()){
			return  Redirect::back()
			                ->withInput(Input::all())
			                ->withErrors($validator->errors());
		}
		$file = Input::file('image');
		$folderName = '/uploads/education/'.'user_id_'.Auth::user()->id;
		$data = app('imageService')->uploadImage($file,$folderName);
		if($data['code'] != 200){
		    return  Redirect::back()
			                ->withInput(Input::all())
			                ->withErrors($data['error']);
		}
		$user_education = UserEducation::create([
            'user_id'  => Auth::user()->id,
            'image' => $data['filename'],
            'status'   => 0,
    	]);
    	return Redirect::route('identify.education')
                ->withSuccess('????????????????????????????????????');

	}
	public function dynamic (Request $request)
	{
		$type = $request->type;
		$user_id = intval($request->user_id);
		$limit = 10;
		switch ( $type )
		{
			case 'blog':
				$datas = app('repository')->model(Blog::class)->forUser($user_id)->recent()->paginate($limit)->appends(['user_id' =>$user_id,'type'=>$type ]);
				foreach( $datas as $key => $data )
				{
					$data->url = route('blog.show',$data->id);
				}
				$count = app('repository')->model(Blog::class)->forUser($user_id)->count();
				break;
			case 'activity':
				$datas = app('repository')->model(Activity_actors::class)->select(['activities.city','activities.province','activities.city','activities.cate_id','activities.location','activities.name','activities.begin_time','activities.close_time','activity_actors.*'])->join('activities','activities.id','=','activity_actors.activity_id')->where('activity_actors.user_id',$user_id)->orderBy('activity_actors.id','desc')->groupby('activity_actors.activity_id')->distinct()->paginate($limit)->appends(['user_id' =>$user_id,'type'=>$type ]);
				$count = app('repository')->model(Activity::class)->where('user_id',$user_id)->count();
				foreach( $datas as $key => $data )
				{
					$city = app('categoryTreeRepository')->setTable('areas',app(Area::class))->getTitle($data->city);
					$province = app('categoryTreeRepository')->setTable('areas',app(Area::class))->getTitle($data->province);
					$data->cate = app('categoryTreeRepository')->setTable('activity_categories',app(ActivityCategory::class))->getTreeCategoryDetail($data->cate_id);
					$data->location = $province . ' ' . $city . ' ' . $data->location;
					$data->url = route('activity.show',['id' => $data->activity_id]);
					$time = Carbon::now()->toDateTimeString();
					if($time < $data->begin_time){
						$data->time_desc = "?????????";
					}else if($time > $data->close_time){
						$data->time_desc = "?????????";
					}else{
						$data->time_desc = "?????????";
					}
				}
				break;
			case 'space':
				$page_paramter =  $var = [
		        	'p' =>  isset($request->p) ? intval($request->p) : 0,
		        	'loadId' =>  isset($request->loadId) ? intval($request->loadId) : 0,
		        	'load_count' =>  isset($request->load_count) ? intval($request->load_count) : 0,
		        	'app' =>  $type,
		        	'feed_type' =>  'post',
		        	'user_id' => $user_id,
		        	'feed_key' =>  isset($request->feed_key) ? $request->feed_key : '',
		        	'fgid' =>   0,
		        	'topic_id' =>   0,
		        	'gid' =>  0,
		        ];
		        $page_paramter['type'] = $type;
		        $var['type'] = 'userSpace';
		        $var['page_paramter'] = $page_paramter;
		        $var['limitnums'] = $limit;
		        $content = app('spaceRepository')->getData($var, '_FeedList');
				break;
			case 'thread':
				$datas = app('repository')->model(Thread::class)->forUser($user_id)->recent()->paginate($limit)->appends(['user_id' =>$user_id,'type'=>$type ]);
				foreach( $datas as $key => $data )
				{
					$data->url = route('thread.show',$data->id);
				}
				$count = app('repository')->model(Thread::class)->forUser($user_id)->count();
				break;
			case 'vote':
				$datas = app('repository')->model(Vote::class)->forUser($user_id)->recent()->paginate($limit)->appends(['user_id' =>$user_id,'type'=>$type ]);
				foreach( $datas as $key => $data )
				{
					$data->url = route('vote.show',$data->id);
					$data->title = $data->subject;
				}
				$count = app('repository')->model(Vote::class)->forUser($user_id)->count();
				break;
			case 'gift':
				$datas = DB::table('send_gift')->select('gift.gift_name','send_gift.anonymous','send_gift.number','send_gift.created_at', 'send_user.id as send_user_id','send_user.username as send_username','be_send_user.id as be_send_user_id','be_send_user.username as be_send_username')
												->join('users as send_user','send_user.id','=','send_gift.user_id')
												->join('users as be_send_user','be_send_user.id','=','send_gift.to_user_id')
												->join('gift','gift.id','=','send_gift.gift_id')
												->where('send_gift.user_id' ,$user_id)
												->orWhere('send_gift.to_user_id',$user_id)
												->paginate($limit)
												->appends(['user_id' =>$user_id,'type'=>$type ]);
				foreach($datas as $key => $data)
				{
					if($data->anonymous == 1)
					{
						$data->title = "<a href='javascript:;' target='_blank' class='orange'>??????".'</a>??????'.$data->number.'???"'.$data->gift_name.'"???'."<a href='".route('user.home',['uid'=>$data->be_send_user_id])."' target='_blank' class='orange'>".$data->be_send_username.'</a>';
					}else{
						$data->title = "<a href='".route('user.home',['uid'=>$data->send_user_id])."' target='_blank' class='orange'>".$data->send_username.'</a>??????'.$data->number.'???"'.$data->gift_name.'"???'."<a href='".route('user.home',['uid'=>$data->be_send_user_id])."' target='_blank' class='orange'>".$data->be_send_username.'</a>';
					}

					$data->url = 'javascript:;';
				}
				$count = DB::table('send_gift')->where('user_id' ,$user_id)->orWhere('to_user_id',$user_id)->count();
				break;
			default:

				break;
		}

		if($type == 'space'){
			if (empty($content ['html'])) {
            	return [
					'html' => '?????????????????????',
					'pageHtml' => '',
				];
			}
			$html = $content['html'];
			$pageHtml = $content['pageHtml'];
		}else{
			if(!$datas){
				return [
					'html' => '?????????????????????',
					'pageHtml' => '',
				];
			}
			$html = view('users.dynamic')->with('datas',$datas)->with('count',$count)->with('type',$type)->__toString();
			$pageHtml = with(new \Hifone\Foundations\Pagination\CustomerPresenter($datas))->render();
		}
		$pageHtml = view('layouts.page')->with('pageHtml',$pageHtml)->__toString();

		return [
			'html' => $html,
			'pageHtml' => $pageHtml,
		];
	}
	public function dynamicDel(Request $request)
	{
		$type = $request->type;
		$user_id = Auth::id();
		$id = $request->id;
		switch ( $type )
		{
			case 'blog':
			//	app('repository')->model(Blog::class)->forUser($user_id)->where('id',$id)->delete();
				app('spaceRepository')->delSpace($type,$id,$user_id);
				break;
			case 'vote':
				app('repository')->model(Vote::class)->forUser($user_id)->where('id',$id)->delete();
				app('spaceRepository')->delSpace($type,$id,$user_id);
				break;
			case 'thread':
				app('repository')->model(Thread::class)->forUser($user_id)->where('id',$id)->delete();
				app('spaceRepository')->delSpace($type,$id,$user_id);
				break;
			case 'space':
				app('repository')->model(Space::class)->forUser($user_id)->where('id',$id)->delete();
				app('spaceRepository')->delSpace($type,$id,$user_id);
				break;
			default:
				return [
					'code' => 201,
					'message' => '????????????',
				];
			 	break;
		}
		return [
			'code' => 200,
			'message' => '????????????',
		];
	}
	public function rank (Request $request)
	{
		$type = !isset($request->type) ? 'view' : $request->type;
		$data = app('userRepository')->ranks($type);
		$user = Auth::user();
		return  $this->view('users.rank',$data)->with('type',$type)->with('user',$user);
	}
	public function star ()
	{
		$user = Auth::user();
		$star = app('userRepository')->getStar($user);

		$this->breadcrumb->push([
				'????????????' => route('user.home',['uid'=>Auth::id()]),
                '????????????' => ''
        ]);
		return  $this->view('users.star')->with('star',$star)->with('user',$user);
	}
	public function birthUsers ()
	{
		$date = date('%-m-d',time());
		$users =  User::where('birthday','like',$date)->paginate(10);
		$count = count($users);
		$users = app('userRepository')->handleUsers($users);
		return  $this->view('users.birth_users')->with('users',$users)->with('count',$count);
	}
	public function more (Request $request)
	{
		$type = isset($request->type) ? $request->type : 'boy';
		if($type == 'boy'){
			$sex = 1;
			$title = '????????????';
		}else{
			$sex = 2;
			$title = '????????????';
		}
		$users = DB::table('users')->select('users.*','user_datings.aboutme','user_standards.lovestatus')
            		->leftJoin('user_datings', 'users.id', '=', 'user_datings.user_id')
            		->leftJoin('user_standards','user_standards.user_id','=','users.id')
            		->where('users.sex',$sex)
            		->orderBy('users.id','desc')
            		->paginate('10');
        $standard_data = config('form_config.standard_data');
		$users = app('userRepository')->handleUsers($users);
		return $this->view('users.more')->with('users',$users)->with('standard_data',$standard_data)->with('title',$title);
	}
	public function userDetail (Request $request)
	{
		$uid = isset($request->uid) ? $request->uid : 0;
		$user = User::findByUid($uid);
		if(!$user){
			return [
				'code' 	=> 201,
				'msg'	=> '????????????'
			];
		}
		if ($user->follows()->forUser(Auth::id())->count()) {
			$follow_text = "????????????";
        } else {
	        $follow_text = "?????????";
        }
		$basic_data = config('form_config.basic_data');
		$html = $this->view('users.detail')->with('user',$user)->with('follow_text',$follow_text)->with('basic_data',$basic_data)->__toString();
		return [
			'code' => 200,
			'html' => $html
		];
	}
	public function weekstar()
	{
		$girl_users = app('userRepository')->getWeekstarUsers(2,12);
		$boy_users = app('userRepository')->getWeekstarUsers(1,12);
		return $this->view('users.weekstar')->with('girl_users',$girl_users)->with('boy_users',$boy_users);
	}
	/**
     * hash user's raw password.
     *
     * @param string $password plain text form of user's password
     * @param string $salt     salt
     *
     * @return string hashed password
     */
    private function hashPassword($password, $salt)
    {
        return $this->hasher->make($password, ['salt' => $salt]);
    }
    public function follow (Request $request)
    {
	    $users = app('userRepository')->getWeekstarUsers(0,16);
    	return $this->view('auth.follow')->with('user',Auth::user())->with('users',$users);
    }
    public function followSubmit (Request $request)
    {
    	$uids = $request->uids;
    	if(count($uids)){
	    	foreach( $uids as $key => $uid )
	    	{
				if($uid != Auth::id())
				{
					$user = User::findByUid($uid);
					if($user){
						dispatch(new AddFollowCommand($user));
					}
				}
	    	}
    	}
    	return Redirect::to('/home');
    }
	public function invitation()
	{
		$this->breadcrumb->push([
				'????????????' => route('user.home',['uid'=>Auth::id()]),
                '????????????' => ''
        ]);
		return $this->view('users.invitation.index')->with('user',Auth::user());
	}
	public function invitationShow(Request $request)
	{
		$this->breadcrumb->push([
				'????????????' => route('user.home',['uid'=>Auth::id()]),
                '????????????' => ''
        ]);
		$inviter_uid = isset($request->uid) ? $request->uid : 0;
		Cookie::queue('inviter_uid',$inviter_uid,60);
		$inviter = User::findByUidOrFail($inviter_uid);
		$base_data = config('form_config.basic_data');
		$inviter_firends = app('userRepository')->getInviters($inviter_uid);
		return $this->view('users.invitation.show')
					->with('inviter',$inviter)
					->with('base_data',$base_data)
					->with('inviter_firends',$inviter_firends);
	}
	public function invitationSend()
	{
		$input = Input::all();
    	$rules = [
			'email' => 'required|string',
			'message' => 'required|between:5,50'
	    ];
	    $messages = [
			'email.required' => '???????????????',
			'message.required' => '?????????????????????',
			'message.between' => '???????????????10-50???'
	    ];

	    $validator = Validator::make($input,$rules,$messages);

	    if($validator->errors()->first()){
			return  Redirect::back()
			                ->withInput(Input::all())
			                ->withErrors($validator->errors());
		}
		$email = trim($input['email']);
		$email = str_replace('???',',',$email);
		$emails = explode(',',$email);
		foreach ($emails as $key => $email) {
			$mode = '/\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/';
        	if(preg_match($mode,$email)){
				$user = Auth::user();
				Mail::send('emails.invite', ['email' => $email,'user' => Auth::user(),'app_url' => config('app.url'),'content' => $input['message']], function($message) use($email,$user) {
					$message->from(config('mail.from')['address'],config('mail.from')['name']);
				    $message->subject('['.config('app.web_name').'] ????????????');
				    $message->to($email);
				});
			}
		}
		return  Redirect::back()
						->withInput(Input::all())
						->withSuccess(['?????????????????????']);
	}
	public function redPacket()
	{
		$input = Input::all();
		$rules = [
			'pay_id' => "required|in:1,2",
			'money' => 'required'
		];
		$messages = [
			'pay_id.required'	=> '?????????????????????',
			'pay_id.in'	=> '?????????????????????',
			'money.required' => '??????????????????',
		];

		$validator = Validator::make($input,$rules,$messages);

		if($validator->errors()->first()){
			return [
				'code' => 201,
				'message' => $validator->errors()->first(),
            ];
		}
		$money = intval(Input::get('money'));
		// ??????????????????
		$out_trade_no = buildOutTradeNo();

		Packet::create([
			'user_id' => Auth::id(),
			'pay_id' =>Input::get('pay_id'),
			'pay_status' => 0,
			'money' => $money,
		]);
		switch (Input::get('pay_id')) {
			case '1':
				// ??????????????????
				$alipay = app('alipay.web');
				$alipay->setOutTradeNo($out_trade_no);
				$alipay->setTotalFee($money);
				$alipay->setNotifyUrl(config('latrell-alipay-web.activity_notify_url'));
				$alipay->setSubject('?????????'.$out_trade_no);
				$alipay->setBody('?????????'.$out_trade_no);

			  //  $alipay->setQrPayMode('4'); //?????????????????????????????????????????????????????????????????????

				// ????????????????????????
				return [
					'code' => 210,
					'status' => 1,
					'url' => $alipay->getPayLink(),
				];
				break;

			default:
				// ??????????????????
				$alipay = app('alipay.web');
				$alipay->setOutTradeNo($out_trade_no);
				$alipay->setTotalFee($money);
				$alipay->setNotifyUrl(config('latrell-alipay-web.activity_notify_url'));
				$alipay->setSubject('?????????'.$out_trade_no);
				$alipay->setBody('?????????'.$out_trade_no);

			  //  $alipay->setQrPayMode('4'); //?????????????????????????????????????????????????????????????????????

				// ????????????????????????
				return [
					'code' => 210,
					'status' => 1,
					'url' => $alipay->getPayLink(),
				];
				break;
		}
	}
}
