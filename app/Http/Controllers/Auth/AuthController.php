<?php

/*
 * This file is part of Hifone.
 *
 *
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Hifone\Http\Controllers\Auth;

use Validator;
use AltThree\Validator\ValidationException;
use Hifone\Commands\Identity\AddIdentityCommand;
use Hifone\Events\User\UserWasAddedEvent;
use Hifone\Hashing\PasswordHasher;
use Hifone\Http\Controllers\Controller;
use Hifone\Models\Identity;
use Hifone\Models\Provider;
use Hifone\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
use Input;
use Laravel\Socialite\Two\InvalidStateException;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;
    //注册后返回主页
    protected $redirectPath = '/index';

    protected $hasher;

    public function __construct(PasswordHasher $hasher,Request $request)
    {
        $this->hasher = $hasher;
        $this->middleware('guest', ['except' => ['logout', 'getLogout','forgetPassword']]);
		$request->session()->put('username', "");
    }

    public function getLogin(Request $request)
    {
        $providers = Provider::recent()->get();
		$request->session()->put('username', "");
        return $this->view('auth.login')
            ->withCaptchaLoginDisabled(Config::get('setting.captcha_login_disabled'))
            ->withCaptcha(route('captcha', ['random' => time()]))
            ->withConnectData(Session::get('connect_data'))
            ->withProviders($providers)
            ->withPageTitle(trans('hifone.login.login'));
    }

    public function landing()
    {
        return $this->view('auth.landing')
            ->withConnectData(Session::get('connect_data'))
            ->withPageTitle('');
    }

    /**
     * Logs the user in.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postLogin(Request $request)
    {
        $loginData = Input::only(['login', 'password']);
		$remember = Input::get('remember');
        /*$verifycode = array_pull($loginData, 'verifycode');
        if (!Config::get('setting.captcha_login_disabled') && $verifycode != Session::get('phrase')) {
            // instructions if user phrase is good
            return Redirect::to('auth/login')
            ->withInput(Input::except('password'))
            ->withError(trans('hifone.captcha.failure'));
        }*/

        // Login with username or email.
        $loginKey = Str::contains($loginData['login'], '@') ? 'email' : 'mobile';
        $loginData[$loginKey] = array_pull($loginData, 'login');
        // Validate login credentials.
        if (Auth::validate($loginData)) {

            // We probably want to add support for "Remember me" here.
            Auth::attempt($loginData, $remember);

            if (Session::has('connect_data')) {
                $connect_data = Session::get('connect_data');
                dispatch(new AddIdentityCommand(Auth::user()->id, $connect_data));
            }
            app(User::class)->where('id',Auth::user()->id)->update(['last_ip' => get_client_ip()]);
			$request->session()->put('username', $loginData);
            return Redirect::to('/index')
                ->withSuccess(sprintf('%s %s', trans('hifone.awesome'), trans('hifone.login.success')));
        }
		$request->session()->put('username', "");
        return redirect('/auth/login')
            ->withInput(Input::except('password'))
            ->withError(trans('hifone.login.invalid'));
    }

    public function getRegister()
    {
        $connect_data = Session::get('connect_data');
		$base_data = config('form_config.basic_data');
        return $this->view('auth.register')
        	->with('base_data',$base_data)
            ->withCaptchaRegisterDisabled(Config::get('setting.captcha_register_disabled'))
            ->withCaptcha(route('captcha', ['random' => time()]))
            ->withConnectData($connect_data)
            ->withPageTitle(trans('hifone.login.login'));
    }

    public function postRegister()
    {
	    $result = app('smsRepository')->checkCode('registerMobile',trim(Input::get('code')),trim(Input::get('mobile')));
	    if($result['code'] == 201){
		    return [
				'code' => 201,
				'message' => $result['message'],
		    ];
	    }
        // Auto register
        $connect_data = Session::get('connect_data');
        $from = '';
        if ($connect_data && isset($connect_data['extern_uid'])) {
            $registerData = [
                'username' => $connect_data['nickname'].'_'.$connect_data['provider_id'],
                'nickname' => $connect_data['nickname'],
                'password' => $this->hashPassword(str_random(8), ''),
                'email'    => $connect_data['extern_uid'].'@'.$connect_data['provider_id'],
                'salt'     => '',
            ];
            $from = 'provider';
        } else {
            $registerData = Input::only(['username', 'email', 'password', 'repassword','sex','verifycode','school_id','school','city','city','province','location','work','birthday','mobile']);
            $verifycode = array_pull($registerData, 'verifycode');
            if (!Config::get('setting.captcha_register_disabled') && $verifycode != Session::get('phrase')) {
                return Redirect::to('auth/register')
                    ->withTitle(sprintf('%s %s', trans('hifone.whoops'), trans('hifone.users.add.failure')))
                    ->withInput(Input::all())
                    ->withErrors([trans('hifone.captcha.failure')]);
            }
        }
        /*try {
            $user = $this->create($registerData);
        } catch (ValidationException $e) {
            return Redirect::to('auth/register')
                ->withTitle(sprintf('%s %s', trans('hifone.whoops'), trans('hifone.users.add.failure')))
                ->withInput(Input::all())
                ->withErrors($e->getMessageBag());

        }*/
		$rules = [
		        'username' => ['required', 'max:15','unique:users,username'],
		        'email'    => 'required|max:255|email|unique:users,email',
		        'mobile' => 'required',
		        'password' => 'required',
		        'sex' 	   => 'required',
		        'school_id' => 'required|numeric|exists:schools,id',
		    	'school' => 'required',
		    	'city' => 'required|integer|min:1|exists:areas,id',
		    	'province' => 'required|integer|min:1|exists:areas,id',
		    	'location' => 'required|string',
		    	'work' => 'required|string',
		    	'birthday' => 'required|string',
		];

		$validator = Validator::make($registerData,$rules);

		if($validator->errors()->first()){
			return [
				'code' => 201,
				'message' => $validator->errors()->first(),
            ];
		}

		$salt = $this->generateSalt();
		$data = $registerData;
        $password = $this->hashPassword($data['password'], $salt);

        $user = User::create([
            'username'     => $data['username'],
            'email'        => $data['email'],
            'salt'         => $salt,
            'password'     => $password,
            'mobile'	=> $data['mobile'],
	        'sex' 	   => $data['sex'],
	        'school_id' => $data['school_id'],
	    	'school' => $data['school'],
	    	'city' => $data['city'],
	    	'province' => $data['province'],
	    	'location' => $data['location'],
	    	'work' => $data['work'],
	    	'birthday' => $data['birthday'],
        ]);



        if ($from == 'provider') {
            dispatch(new AddIdentityCommand($user->id, $connect_data));
        }

        event(new UserWasAddedEvent($user));

        Auth::guard($this->getGuard())->login($user);
		return [
			'code' => 200,
			'message' => '注册成功'
        ];
       /* return redirect($this->redirectPath());*/
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     *
     * @return User
     */
    protected function create(array $data)
    {
        $salt = $this->generateSalt();

        $password = $this->hashPassword($data['password'], $salt);

        $user = User::create([
            'username'     => $data['username'],
            'email'        => $data['email'],
            'salt'         => $salt,
            'password'     => $password,
            'mobile'	=> $data['mobile'],
	        'sex' 	   => $data['sex'],
	        'school_id' => $data['school_id'],
	    	'school' => $data['school'],
	    	'city' => $data['city'],
	    	'province' => $data['province'],
	    	'location' => $data['location'],
	    	'work' => $data['work'],
	    	'birthday' => $data['birthday'],
        ]);

        return $user;
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

    /**
     * generate salt for hashing password.
     *
     * @return string
     */
    private function generateSalt()
    {
        return str_random(16);
    }

    public function provider($slug)
    {
        return \Socialite::with($slug)->redirect();
    }

    public function callback($slug)
    {
        if (Input::has('code')) {
            $provider = Provider::where('slug', '=', $slug)->firstOrFail();
            try {
                $extern_user = \Socialite::with($slug)->user();
            } catch (InvalidStateException $e) {
                return Redirect::to('/auth/login')
                    ->withErrors([trans('hifone.oauth.errors.invalidstate')]);
            }

            //检查是否已经连接过
            $identity = Identity::where('provider_id', '=', $provider->id)->where('extern_uid', '=', $extern_user->id)->first();

            if (is_null($identity)) {
                Session::put('connect_data', ['provider_id' => $provider->id, 'provider_name' => $provider->name, 'extern_uid' => $extern_user->id, 'nickname' => $extern_user->nickname]);

                return Redirect::to('/auth/landing');
            }
            //已经连接过，找出user_id, 直接登录
            $user = User::find($identity->user_id);

            if (!Auth::check()) {
                Auth::login($user, true);
            }

            return Redirect::to('/')
            ->withSuccess(sprintf('%s %s', trans('hifone.awesome'), trans('hifone.login.success_oauth', ['provider' => $provider->name])));
        }
    }

    public function userBanned()
    {
        if (Auth::check() && !Auth::user()->is_banned) {
            return redirect(route('home'));
        }
        //force logout
        Auth::logout();

        return Redirect::to('/');
    }

    // 用户屏蔽
    public function userIsBanned($user)
    {
        return Redirect::route('user-banned');
    }

}
