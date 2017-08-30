<?php

namespace Hifone\Http\Controllers;

use Hifone\Models\Gift;
use AltThree\Validator\ValidationException;
use DB;
use Auth;
use Hash;
use Mail;
use Input;
use Session;
use Redirect;
use Carbon\Carbon;
use Hifone\Models\User;
use Hifone\Models\Blog;
use Hifone\Models\Area;
use Hifone\Models\Vote;
use Hifone\Models\Space;
use Hifone\Models\Reply;
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

        $threads = Thread::forUser($user->id)->recent()->limit(10)->get();
        $replies = Reply::forUser($user->id)->recent()->limit(10)->get();

		$base_data = config('form_config.basic_data');
		$happy_data = config('form_config.happy_data');
		$detail_data = config('form_config.detail_data');
		$dating_data = config('form_config.dating_data');
		$standard_data = config('form_config.standard_data');
		$user_happy =  $user->happy;
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

		if(Auth::id() != $user->id ){
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
	//	$packet_users = handleUsers($packet_users)；
		$from_lang = Auth::id() == $user->id ? '我的' : 'TA的';

		if ($user->follows()->forUser(Auth::id())->count()) {
			$follow_text = "取消关注";
        } else {
	        $follow_text = "加关注";
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

            $user->update($data);
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
            ->withSuccess('解绑成功');
    }

    public function avatarupdate()
    {
	    $input = Input::all();
    	$rules = [
			'avatar' => 'required|image' ,
	    ];
	    $messages = [
			'avatar.required' => '未选择图片',
			'avatar.image' => '图片类型错误'
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
            ->withSuccess('头像更新成功');
    }


    protected function resetPassword()
    {
        $user = Auth::user();

        if (Hash::check(Input::only('old_password')['old_password'], $user->password)) {
            $password = Input::only('password')['password'];

            $password_confirmation = Input::only('password_confirmation')['password_confirmation'];

            if (!($password == $password_confirmation)) {
                return Redirect::back()
                    ->withInfo('当前输入新密码与确认密码不一致, 请重新输入.');
            } else {
                $user->password = Hash::make(Input::only('password')['password']);

                $user->save();

                return Redirect::back()
                    ->withSuccess('密码修改成功!');
            }
        } else {
            return Redirect::back()
                ->withErrors(['输入当前密码输入错误, 请重新输入.']);
        }
    }
    /* 忘记密码 */
    public function forgetPassword(Request $request)
    {
	    if(isset($request->dosubmit)){
		    if(isset($request->type) && $request->type == 'mobile')
		    {
			    $user = User::where('mobile',$request->mobile)->first(['id']);
			    if(!$user){
				    return Redirect::back()
                				->withWarning('不存在绑定该手机号码的用户');
			    }
			    return $this->view('auth.forget_password')->with('mobile',$request->mobile);
		    }
		    if(isset($request->type) && $request->type == 'email'){
			    $user = User::where('email',$request->email)->first(['id']);
			    if(!$user){
				    return Redirect::back()
                				->withWarning('不存在绑定该邮箱的用户');
			    }
			    $status = app('userRepository')->send_email_hash($user->id,$request->email,'forget_password');

				if($status){
					return  $this->view('message.message2')
					                ->withTitle('取回密码')
					                ->withContent('取回密码的方法已经通过Email发送到您的信箱中，请在3天之内修改您的密码。');
				}else{
					return  Redirect::back()
					                ->withInput(Input::all())
					                ->withErrors(['邮箱发送失败，请稍后重试！）']);
				}
		    }
		    return Redirect::back()->withWarning('参数错误');
	    }
    	return $this->view('auth.forget_password');
    }
    /*忘记密码获取手机短信*/
    public function forgetPasswordMobile (Request $request)
    {
	    $data = $request->input();
	    $rules = [
	    	'mobile' => "required|regex:/^1[34578][0-9]{9}/",
	    ];
	    $message = [
	    	'mobile.regex' 		=> '手机格式不正确',
	    	'mobile.required'	=> '手机号码不能为空',
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
				'message' => '不存在绑定该手机号码的用户',
            ];
		}
		$result = app('smsRepository')->send($mobile,'forgetPasswordMobile');
		if($result['code'] == 200){
			return [
				'code' => 200,
				'veri_code' => Session::get('forgetPasswordMobilesms_code'),
				'message' => '已发送短信验证码到该手机，请注意查收',
            ];
		}
		else{
			return [
				'code' => 201,
				'message' => '发送失败，请联系管理员',
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
	         return  $this->view('message.message2')->with('title','信息提示')->with('content','邮箱地址验证失败，请重新验证');
	    }
	    return  $this->view('message.message2')->with('title','信息提示')->with('content','邮箱地址验证失败，请重新验证');
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
	    	'mobile.regex' 		=> '手机格式不正确',
	    	'mobile.required'	=> '手机号码不能为空',
	    	'code.required' => '验证码不能为空',
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
		    /*存储验证通过的手机号码*/
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
                ->withInfo('当前输入新密码与确认密码不一致, 请重新输入.');
        } else {
	        $user->password = $this->hashPassword(Input::only('password')['password'], $user->salt);

            $user->save();

            return Redirect::to('/auth/login')
                ->withSuccess('修改成功，使用新密码登陆!');
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
	    	return '该邮箱已经被注册';
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
	    	'email.unique' 		=> '已存在该邮箱',
	    	'username.unique' 	=> '已存在该昵称',
	    	'username.required'	=> '昵称不能为空',
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
    	if(!($areas = S('areas_0'))){
	    	$areas = Area::where('pid',0)->get();
	    	S('areas_0', $areas,10);
    	}

    	$area = Area::where('id',$area_id)->first();

    	if(!($schools = S('area_schools_'.$area_id))){
	    	$schools = $area->schools;
	    	S('area_schools_'.$area_id, $schools,10);
    	}

    	return  $this->view('users.loadschool')
    		->with('area_id',$area_id)
            ->withAreas($areas)
            ->withSchools($schools)->render();
    }
    public function base (Request $request)
    {
	    $this->breadcrumb->push([
				'个人中心' => route('user.home',['uid'=>Auth::id()]),
                '个人设置' => route('profile.base',['uid'=>Auth::id()])
        ]);
        $user = Auth::user();

		$data = $user->toArray();

        $base_data = config('form_config.basic_data');
    	return  $this->view('users.profile.base')->with('user',$user)->with('base_data',$base_data)->with('data',$data);
    }
    public function baseUpdate ()
    {
    	$input = Input::get();
    	$rules = [
	    	'school_id' => 'required|numeric|exists:schools,id',
	    	'school' => 'required',
	    	'city' => 'required|integer|min:1|exists:areas,id',
	    	'work' => 'required|string|',
	    	'industry' => 'required|string|',
	    ];
	    $messages = [
	    	'school.required' => '学校必填',
	    	'school_id.exists' => '不存在该学校',
	    	'city.min' => '居住地必填',
	    	'city.exists' => '不存在该城市',
	    	'work.required' => '职业必填',
	    	'industry.required' => '行业必填',
	    ];

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
	   	return Redirect::back()
                ->withUser($user)
                ->withData($data)
                ->withSuccess('个人资料更新成功');
    }
    public function standard (Request $request)
    {
	    $this->breadcrumb->push([
				'个人中心' => route('user.home',['uid'=>Auth::id()]),
                '个人设置' => route('profile.base',['uid'=>Auth::id()])
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
    public function standardUpdate ()
    {
	    $input = Input::get();
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
    	return Redirect::back()
                ->withData($input)
                ->withSuccess('个人资料更新成功');
    }
    public function dating ()
    {
    	$this->breadcrumb->push([
				'个人中心' => route('user.home',['uid'=>Auth::id()]),
                '个人设置' => route('profile.base',['uid'=>Auth::id()])
        ]);
        $user_dating = UserDating::findByUid(Auth::id());
        $aboutme = $user_dating ? $user_dating->aboutme : '';
    	return  $this->view('users.profile.dating')->with('aboutme',$aboutme);
    }
    public function datingUpdate ()
    {
	    $input = Input::get();
	    if(!isset($input['aboutme']))
	    {
		    return Redirect::back()
                ->withErrors(['参数错误']);
	    }
	    $user_dating = UserDating::findByUid(Auth::id());
	    if(!$user_dating){
		    $data['user_id'] = Auth::id();
		    $data['aboutme'] = $input['aboutme'];
	    	UserDating::create($data);
	    }else{
		    UserDating::where('user_id',Auth::id())->update(['aboutme' =>$input['aboutme'] ]);

	    }
	    return Redirect::back()
                ->withSuccess('个人资料更新成功');
	}
	public function detail ()
	{
		$this->breadcrumb->push([
				'个人中心' => route('user.home',['uid'=>Auth::id()]),
                '个人设置' => route('profile.base',['uid'=>Auth::id()])
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
	public function detailUpdate ()
	{
		$input = Input::get();
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
    	return Redirect::back()
                ->withData($input)
                ->withSuccess('个人资料更新成功');
	}
	public function happy ()
	{
		$this->breadcrumb->push([
				'个人中心' => route('user.home',['uid'=>Auth::id()]),
                '个人设置' => route('profile.base',['uid'=>Auth::id()])
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
                ->withData($input)
                ->withSuccess('个人资料更新成功');
	}
	public function avatar ()
	{
		$this->breadcrumb->push([
				'个人中心' => route('user.home',['uid'=>Auth::id()]),
                '个人设置' => route('profile.base',['uid'=>Auth::id()])
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
				'个人中心' => route('user.home',['uid'=>Auth::id()]),
                '个人设置' => ''
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
	    	'mobile.regex' 		=> '手机格式不正确',
	    	'mobile.required'	=> '手机号码不能为空',
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
				'message' => '该手机已被占用',
            ];
		}
		$result = app('smsRepository')->send($mobile,'changeMobile');
		if($result['code'] == 200){
			return [
				'code' => 200,
				'message' => '已发送短信验证码到该手机，请注意查收',
            ];
		}
		else{
			return [
				'code' => 201,
				'message' => '发送失败，请联系管理员',
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
	    	'mobile.regex' 		=> '手机格式不正确',
	    	'mobile.required'	=> '手机号码不能为空',
	    	'code.required' => '验证码不能为空',
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
		   	return Redirect::route('identify.mobile')->withSuccess(['手机更换成功']);
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
	    	'mobile.regex' 		=> '手机格式不正确',
	    	'mobile.required'	=> '手机号码不能为空',
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
				'message' => '该手机已被占用',
            ];
		}
		$result = app('smsRepository')->send($mobile,'registerMobile');
		if($result['code'] == 200){
			return [
				'code' => 200,
				'veri_code' => Session::get('registerMobilesms_code'),
				'message' => '已发送短信验证码到该手机，请注意查收',
            ];
		}
		else{
			return [
				'code' => 201,
				'message' => '发送失败，请联系管理员',
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
	    	'mobile.regex' 		=> '手机格式不正确',
	    	'mobile.required'	=> '手机号码不能为空',
	    	'code.required' 	=> '验证码不能为空',
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
				'message' => '操作成功',
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
				'个人中心' => route('user.home',['uid'=>Auth::id()]),
                '个人设置' => ''
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
	    	'email.email' 		=> '邮箱格式不正确',
	    	'email.required'	=> '邮箱不能为空',
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
			                ->withErrors(['您要验证的邮箱地址已经激活过了，请重新设置自己的邮箱']);
		}

		$status = app('userRepository')->send_email_hash(Auth::id(),$email);

		if($status){
			return  Redirect::back()
			                ->withInput(Input::all())
			                ->withSuccess(['激活链接已发送到你的邮箱，请登录查看！（温馨提示：如果收件箱没有收到，请稍等一会或查看一下垃圾箱哦！）']);
		}else{
			return  Redirect::back()
			                ->withInput(Input::all())
			                ->withErrors(['邮箱发送失败，请稍后重试！）']);
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
		            return  $this->view('message.message')->with('title','信息提示')->with('content','您要验证的邮箱地址已经激活过了，请进入个人资料重新设置自己的邮箱');
	            }
	            app(User::class)->where('id',$email_code->user_id)->update(['email_status' => 1,'email' => $email_code->email]);
	            return  $this->view('message.message')->with('title','信息提示')->with('content','恭喜，邮箱地址验证成功！');
	        }
	         return  $this->view('message.message')->with('title','信息提示')->with('content','邮箱地址验证失败，请重新验证');
	    }
	    return  $this->view('message.message')->with('title','信息提示')->with('content','邮箱地址验证失败，请重新验证');
	}
	public function identifyName ()
	{
		$this->breadcrumb->push([
				'个人中心' => route('user.home',['uid'=>Auth::id()]),
                '个人设置' => ''
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
	    	'realname.required' => '姓名不能为空',
			'usercard.required' => '未选择图片',
			'usercard.image' => '图片类型错误',
			'usercard.max' => '图片最大500KB',
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
                ->withSuccess('提交成功，等待管理员审核');
	}
	public function identifyEducation (Request $request)
	{
		$this->breadcrumb->push([
				'个人中心' => route('user.home',['uid'=>Auth::id()]),
                '个人设置' => ''
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
			'image.required' => '未选择图片',
			'image.image' => '图片类型错误',
			'image.max' => '图片最大500KB',
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
                ->withSuccess('提交成功，等待管理员审核');

	}
	public function dynamic (Request $request)
	{
		$type = $request->type;
		$user_id = intval($request->user_id);
		$limit = 10;
		switch ( $type )
		{
			case 'blog':
				$datas = app('repository')->model(Blog::class)->forUser($user_id)->paginate($limit)->appends(['user_id' =>$user_id,'type'=>$type ]);
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
						$data->time_desc = "未开始";
					}else if($time > $data->close_time){
						$data->time_desc = "已结束";
					}else{
						$data->time_desc = "进行中";
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
				$datas = app('repository')->model(Thread::class)->forUser($user_id)->paginate($limit)->appends(['user_id' =>$user_id,'type'=>$type ]);
				foreach( $datas as $key => $data )
				{
					$data->url = route('thread.show',$data->id);
				}
				$count = app('repository')->model(Thread::class)->forUser($user_id)->count();
				break;
			case 'vote':
				$datas = app('repository')->model(Vote::class)->forUser($user_id)->paginate($limit)->appends(['user_id' =>$user_id,'type'=>$type ]);
				foreach( $datas as $key => $data )
				{
					$data->url = route('vote.show',$data->id);
					$data->title = $data->subject;
				}
				$count = app('repository')->model(Vote::class)->forUser($user_id)->count();
				break;
			case 'gift':
				$datas = DB::table('send_gift')->select('gift.gift_name','send_gift.number','send_gift.created_at', 'send_user.id as send_user_id','send_user.username as send_username','be_send_user.id as be_send_user_id','be_send_user.username as be_send_username')
												->join('users as send_user','send_user.id','=','send_gift.user_id')
												->join('users as be_send_user','be_send_user.id','=','send_gift.to_user_id')
												->join('gift','gift.id','=','send_gift.gift_id')
												->where('send_gift.user_id' ,$user_id)
												->orWhere('send_gift.to_user_id',$user_id)
												->paginate($limit)
												->appends(['user_id' =>$user_id,'type'=>$type ]);
				foreach($datas as $key => $data)
				{
					$data->title = "<a href='".route('user.home',['uid'=>$data->send_user_id])."' target='_blank' class='orange'>".$data->send_username.'</a>送了'.$data->number.'个"'.$data->gift_name.'"给'."<a href='".route('user.home',['uid'=>$data->be_send_user_id])."' target='_blank' class='orange'>".$data->be_send_username.'</a>';
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
					'html' => '没有更多数据了',
					'pageHtml' => '',
				];
			}
			$html = $content['html'];
			$pageHtml = $content['pageHtml'];
		}else{
			if(!$datas){
				return [
					'html' => '没有更多数据了',
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
				'个人中心' => route('user.home',['uid'=>Auth::id()]),
                '我的任务' => ''
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
			$title = '男神社区';
		}else{
			$sex = 2;
			$title = '佳丽社区';
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
				'msg'	=> '参数错误'
			];
		}
		if ($user->follows()->forUser(Auth::id())->count()) {
			$follow_text = "取消关注";
        } else {
	        $follow_text = "加关注";
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
				'个人中心' => route('user.home',['uid'=>Auth::id()]),
                '邀请好友' => ''
        ]);
		return $this->view('users.invitation.index')->with('user',Auth::user());
	}
	public function invitationShow(Request $request)
	{
		$this->breadcrumb->push([
				'个人中心' => route('user.home',['uid'=>Auth::id()]),
                '邀请好友' => ''
        ]);
		$inviter_uid = isset($request->uid) ? $request->uid : 0;
		$inviter = User::findByUidOrFail($inviter_uid);
		return $this->view('users.invitation.show')->with('inviter',$inviter);
	}
	public function invitationSend()
	{
		$input = Input::all();
    	$rules = [
			'email' => 'required|string',
			'message' => 'required|between:5,50'
	    ];
	    $messages = [
			'email.required' => '请填写邮箱',
			'message.required' => '请填写邀请附言',
			'message.between' => '邀请附言需10-50字'
	    ];

	    $validator = Validator::make($input,$rules,$messages);

	    if($validator->errors()->first()){
			return  Redirect::back()
			                ->withInput(Input::all())
			                ->withErrors($validator->errors());
		}

		$emails = explode(',',trim($input['email']));
		foreach ($emails as $key => $email) {
			$mode = '/\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/';
        	if(preg_match($mode,$email)){
				$user = Auth::user();
				Mail::send('emails.invite', ['email' => $email,'user' => Auth::user(),'app_url' => config('app.url'),'content' => $input['message']], function($message) use($email,$user) {
					$message->from(config('mail.from')['address'],config('mail.from')['name']);
				    $message->subject('['.config('app.web_name').'] 邀请');
				    $message->to($email);
				});
			}
		}
		return  Redirect::back()
						->withInput(Input::all())
						->withSuccess(['邀请发送成功！']);
	}
	public function redPacket()
	{
		$input = Input::all();
		$rules = [
			'pay_id' => "required|in:1,2",
			'money' => 'required'
		];
		$messages = [
			'pay_id.required'	=> '请选择支付方式',
			'pay_id.in'	=> '支付方式不存在',
			'money.required' => '金额不能为空',
		];

		$validator = Validator::make($input,$rules,$messages);

		if($validator->errors()->first()){
			return [
				'code' => 201,
				'message' => $validator->errors()->first(),
            ];
		}
		$money = intval(Input::get('money'));
		// 创建支付单。
		$out_trade_no = buildOutTradeNo();

		Packet::create([
			'user_id' => Auth::id(),
			'pay_id' =>Input::get('pay_id'),
			'pay_status' => 0,
			'money' => $money,
		]);
		switch (Input::get('pay_id')) {
			case '1':
				// 创建支付单。
				$alipay = app('alipay.web');
				$alipay->setOutTradeNo($out_trade_no);
				$alipay->setTotalFee($money);
				$alipay->setNotifyUrl(config('latrell-alipay-web.activity_notify_url'));
				$alipay->setSubject('单号：'.$out_trade_no);
				$alipay->setBody('单号：'.$out_trade_no);

			  //  $alipay->setQrPayMode('4'); //该设置为可选，添加该参数设置，支持二维码支付。

				// 跳转到支付页面。
				return [
					'code' => 210,
					'status' => 1,
					'url' => $alipay->getPayLink(),
				];
				break;

			default:
				// 创建支付单。
				$alipay = app('alipay.web');
				$alipay->setOutTradeNo($out_trade_no);
				$alipay->setTotalFee($money);
				$alipay->setNotifyUrl(config('latrell-alipay-web.activity_notify_url'));
				$alipay->setSubject('单号：'.$out_trade_no);
				$alipay->setBody('单号：'.$out_trade_no);

			  //  $alipay->setQrPayMode('4'); //该设置为可选，添加该参数设置，支持二维码支付。

				// 跳转到支付页面。
				return [
					'code' => 210,
					'status' => 1,
					'url' => $alipay->getPayLink(),
				];
				break;
		}
	}
}
