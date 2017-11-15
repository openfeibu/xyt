<?php

namespace Hifone\Services\Repository;

use DB;
use Auth;
use Mail;
use Cache;
use Hifone\Models\User;
use Hifone\Models\Role;
use Hifone\Models\Follow;
use Hifone\Models\Convert;
use Hifone\Models\UserView;
use Hifone\Models\EmailCode;
use Hifone\Models\VipRecord;
use Hifone\Models\UserDating;
use Hifone\Models\UserDetail;
use Hifone\Models\UserStandard;

class UserRepository{
	 // 最近错误信息
    protected $error = '';

	public function __construct ()
	{

	}
	public function getError()
    {
        return $this->error;
    }
    /**
     * 更新某个用户的指定Key值的统计数目
     * Key值：
     * space_count：说说总数
     * following_count：关注数
     * follower_count：粉丝数
     * @param  string $key  Key值
     * @param  int    $nums 更新的数目
     * @param  bool   $add  是否添加数目，默认为true
     * @param  int    $uid  用户UID
     * @return array  返回更新后的数据
     */
    public function updateKey($key, $nums, $add = true, $uid = '')
    {
        $key = t($key);
        // 获取当前设置用户的统计数目
        $data = $this->getUserData($uid);

        $data[$key] = $add ? ($data[$key] + intval($nums)) : ($data[$key] - intval($nums));

		if($add){
			User::where('id',$uid)->increment($key,$nums);
		}
		else{
			User::where('id',$uid)->decrement($key,$nums);
		}

		Cache::forget('UserData_'.$uid);

        return $data;
    }
	public function getUserData ($uid)
	{
        if (($data =  Cache::get('UserData_'.$uid)) === false || count($data) == 1) {

            $data = Users::select(DB::raw('thread_count','reply_count','space_count','following_count','follower_count'))->where('id',$uid)->first();

           S('UserData_'.$uid, $data, 1);
        }

        return $data;
	}

    	 /**
     * 获取指定用户的相关信息
     *
     * @param  int   $uid
     *                    用户UID
     * @return array 指定用户的相关信息
     */
    public function getUserInfo($uid)
    {
        $uid = intval($uid);

        // # 判断uid是否存在
        if (0 >= $uid or !$uid) {
            $this->error = trans('public.PUBLIC_UID_INDEX_ILLEAGAL'); /* # UID参数值不合法 */
            return false;

        // # 判断是否有用户缓存
        } elseif (!($user = S('user_info_'.$uid)) and !($user = Cache::get('ui_'.$uid))) {
            $this->error = trans('public.PUBLIC_GET_USERINFO_FAIL'); /* # 获取用户信息缓存失败 */
            $user = $this->_getUserInfo(array('id' => $uid));
        }

        return $user;
    }
	/**
     * 获取指定用户的相关信息
     *
     * @param  array $map
     *                    查询条件
     * @return array 指定用户的相关信息
     */
    private function _getUserInfo(array $map, $field = '*')
    {
        $user = $this->getUserDataByCache($map, $field);
        unset($user ['password']);
        if (! $user) {
            $this->error = trans('public.PUBLIC_GET_INFORMATION_FAIL'); // 获取用户信息失败
            return false;
        } else {
            $uid = $user ['id'];

            $user ['space_url'] = route('user.home',[$user['id']]);

            $user ['space_link'] = "<a href='".$user ['space_url']."' target='_blank' uid='{$user['id']}' event-node='face_card'>".$user ['username'].'</a>';
            $user ['space_link_no'] = "<a href='".$user ['space_url']."' title='".$user ['username']."' target='_blank'>".$user ['username'].'</a>';
            /*// 用户勋章
            $user ['medals'] = model('Medal')->getMedalByUid($user ['id']);
            // 用户认证图标
            $groupIcon = $authIcon = array();
            $aIcon [5] = '<i class="type-trade"></i>';
            $aIcon [6] = '<i class="type-hangjia"></i>';
            $aIcon [7] = '<i class="type-daren"></i>';
            $userGroup = model('UserGroupLink')->getUserGroupData($uid);
            $user ['api_user_group'] = $userGroup [$uid];
            $user ['user_group'] = $userGroup [$uid];
            $only = array(array(), array());
// 			$authenticate = array();
            foreach ($userGroup [$uid] as $value) {
                ($value ['user_group_id'] == 5 || $value ['user_group_id'] == 6) && $value ['company'] = M('user_verified')->where("uid=$uid and usergroup_id=".$value ['user_group_id'])->getField('company');

                if ($value ['is_authenticate'] == 1) {
                    $authIcon [] = $aIcon [$value ['user_group_id']];
                    $authenticate [$value ['user_group_id']] = $value;
                }
                $groupIcon [] = '<img title="'.$value ['user_group_name'].'" src="'.$value ['user_group_icon_url'].'" style="width:auto;height:auto;display:inline;cursor:pointer;" />';
                $type = $value['is_authenticate'] ? 1 : 0;
                if (empty($only[$type])) {
                    $only[$type] = $value;
                } elseif ($only[$type]['ctime'] < $value['ctime']) {
                    $only[$type] = $value;
                }
            }
            if (!empty($only[0])) {
                $user ['group_icon_only'] = $only[0];
            } elseif (!empty($only[1])) {
                $user ['group_icon_only'] = $only[1];
            } else {
                $user['group_icon_only'] = array();
            }
            //group_icon_only end
            $user ['group_icon'] = implode('&nbsp;', $groupIcon);
            //$user ['auth_icon'] = implode ( ' ', $authIcon );
            $user ['credit_info'] = model('Credit')->getUserCredit($uid);
            $user ['intro']     = $user['intro'] ? formatEmoji(false , $user['intro']) : '';*/

            Cache::put('ui_'.$uid, $user, 10);
            S('user_info_'.$uid, $user);

            return $user;
        }
    }
     /**
     * 获取user表的数据，带缓存功能
     *
     * @param  array $map
     *                    查询条件
     * @return array 指定用户的相关信息
     */
    public function getUserDataByCache(array $map, $field = '*')
    {
        $key = 'userData_';
        foreach ($map as $k => $v) {
            $key .= $k.$v;
        }

        $user = Cache::get($key);

        if ($user == false) {

            $data = User::select($field)->where($map)->first();

            $user = $data->toArray();

            $user['avatar_url'] = $data->avatar_small;

            Cache::put($key, $user, 3600); // 缓存24小时
            // 保存key和uid的关系，以方便后面用户资料变化时可以删除这些缓存
            if (isset($user ['id'])) {
                $keys = Cache::get('getUserDataByCache_keys_'.$user ['id']);
                $keys [$key] = $key;
                Cache::put('getUserDataByCache_keys_'.$user ['id'], $keys);
            }
        }

        return $user;
    }
    /*来访*/
	public function getUserViews ($id,$number = 16)
	{
        $users = app('repository')->model(UserView::class)->join('users','users.id','=','user_views.view_user_id')->where('user_views.user_id',$id)->orderBy('user_views.id','desc')->take($number)->get(['user_views.*','users.avatar_url','users.username']);
        $users = app('userRepository')->handleUsers($users);
		return $users;
	}
    /*足迹*/
	public function getUserViewings ($id,$number = 16)
	{
		$users = app('repository')->model(UserView::class)->join('users','users.id','=','user_views.user_id')->where('user_views.view_user_id',$id)->orderBy('user_views.id','desc')->take($number)->get(['user_views.*','users.avatar_url','users.username']);
        $users = app('userRepository')->handleUsers($users);
		return $users;
	}
    public function getUserViewsCount($id,$type = 'to_view')
    {
        if($type == 'to_view')
        {
            $count = app('repository')->model(UserView::class)->join('users','users.id','=','user_views.view_user_id')->where('user_views.user_id',$id)->count();
        }
        if($type == 'be_view')
        {
            $count = app('repository')->model(UserView::class)->join('users','users.id','=','user_views.user_id')->where('user_views.view_user_id',$id)->count();
        }
        return $count;
    }
	public function ranks ($type)
	{
		$limit = 20;
		switch ($type)
		{
			case 'view':
				$users = app('repository')->model(User::class)->orderBy('view_count','desc')->paginate($limit);
				$score = Auth::user()->view_count;
				$rank = app('repository')->model(User::class)->where('view_count','>',$score)->count();
				break;
			case 'follower':
				$users = app('repository')->model(User::class)->orderBy('follower_count','desc')->paginate($limit);
				$score = Auth::user()->follower_count;
				$rank = app('repository')->model(User::class)->where('follower_count','>',$score)->count();
				break;
			case 'girl':
				$users = app('repository')->model(User::class)->where('sex',2)->orderBy('view_count','desc')->paginate($limit);
				$score = Auth::user()->view_count;
				$rank = app('repository')->model(User::class)->where('sex',2)->where('view_count','>',$score)->count();
				break;
			case 'boy':
				$users = app('repository')->model(User::class)->where('sex',1)->orderBy('view_count','desc')->paginate($limit);
				$score = Auth::user()->view_count;
				$rank = app('repository')->model(User::class)->where('sex',2)->where('view_count','>',$score)->count();
				break;
			case 'score':
				$users = app('repository')->model(User::class)->orderBy('score','desc')->paginate($limit);
				$score = Auth::user()->score;
				$rank = app('repository')->model(User::class)->where('score','>',$score)->count();
				break;
			case 'experience':
				$users = app('repository')->model(User::class)->orderBy('experience','desc')->paginate($limit);
				$score = Auth::user()->experience;
				$rank = app('repository')->model(User::class)->where('experience','>',$score)->count();
				break;
			default:
				break;
		}
		$rank +=1;
		$rank_desc = trans('hifone.users.rank_desc.'.$type);
		$users = $this->handleUsers($users);
		$data = [
			'score' => $score,
			'rank' => $rank,
			'rank_desc' => $rank_desc,
			'users' => $users,
		];

		return $data;
	}
	public function handleUsers ($users)
	{
		foreach( $users as $key => $user )
		{
			$user->avatar = $user->avatar_url ? $user->avatar_url : '/images/noavatar/middle.jpg';
		}
		return $users;
	}
	public function changeRole ($user,$experience)
	{

		$roles = app(Role::class)->where('special',0)->get();
		$user_roles = $user->roles;
		$max_experience_role = app(Role::class)->where('special',0)->orderBy('max_experience','desc')->first();
		$min_experience_role = app(Role::class)->where('special',0)->orderBy('min_experience','asc')->first();

		if($user_roles->toArray()){
			foreach( $user_roles as $key => $role )
			{
				$user_role = $role;
			}
			if($user_role->special == 0){
				if($experience > $max_experience_role->max_experience){
					DB::table('role_user')->where('user_id',$user->id)->where('role_id',$user_role->id)->update(['role_id' => $max_experience_role->id]);
					return false;
				}
				if($experience < $min_experience_role->min_experience){
					DB::table('role_user')->where('user_id',$user->id)->where('role_id',$user_role->id)->update(['role_id' => $min_experience_role->id]);
					return false;
				}
				foreach( $roles as $key => $role )
				{
					if($experience >= $role->min_experience && $experience <= $role->max_experience){
						DB::table('role_user')->where('user_id',$user->id)->where('role_id',$user_role->id)->update(['role_id' => $role->id]);
					}
				}
			}
			if($user_role->special == 1){
				if(strtotime(date('Y-m-d')) >= strtotime($user->overdue)){
					app(User::class)->update(['overdue' => 'null'])->where('user_id',$user->id);
					DB::table('role_user')->where('user_id',$user->id)->where('role_id',$user_role->id)->delete(['role_id' => $user_role->id]);
				}
			}
		}
		else{

			if($experience > $max_experience_role->max_experience){
				DB::table('role_user')->insert(['role_id' => $max_experience_role->id,'user_id' => $user->id]);
				return false;
			}
			if($experience < $min_experience_role->min_experience){
				DB::table('role_user')->insert(['role_id' => $min_experience_role->id,'user_id' => $user->id]);
				return false;
			}
			foreach( $roles as $key => $role )
			{
				if($experience >= $role->min_experience && $experience <= $role->max_experience){
					DB::table('role_user')->insert(['role_id' => $role->id,'user_id' => $user->id]);
					return false;
				}
			}
		}

	}
	public function getUserRole($user)
	{
		$user_roles = $user->roles;
		if($user_roles->toArray()){
			foreach( $user_roles as $key => $role )
			{
				return $role;
			}
		}else{
			$this->changeRole($user,$user->experience);
			$user = User::findByUidOrFail($user->id);
			$user_roles = $user->roles;
			foreach( $user_roles as $key => $role )
			{
				return $role;
			}
		}

	}
	public function beVip ($user,$month)
	{
		$user_roles = $user->roles;
		$vip_role = app(Role::class)->where('name','Vip')->first();
		if($user_roles->toArray()){
			foreach( $user_roles as $key => $role )
			{
				$user_role = $role;
				if($role->special == 2 ){
					return false;
				}
			}
			DB::table('role_user')->where('user_id',$user->id)->where('role_id',$user_role->id)->update(['role_id' => $vip_role->id]);

		}else{
			DB::table('role_user')->insert(['role_id' => $role->id,'user_id' => $user->id]);
		}

		if($user->overdue){
			$overdue = overdue($month,$user->overdue);
		}else{
			$overdue = overdue($month);
		}
		app(User::class)->where('id',$user->id)->update(['overdue'=> $overdue]);
		return true;
	}
	public function getRoles ()
	{
		return app(Role::class)->where('special',0)->orderBy('max_experience','asc')->get();
	}

	public function getStar ($user)
	{
		$mobile_status = $profile_status = 1;
		$real_name_status = $user->name ? 1 : 0;
		$user_education = DB::table('user_educations')->where('user_id',Auth::id())->where('status',1)->first(['id']);
		$education_status = $user_education ? 1 : 0;
		$charm_status = $user->view_count >= 1000 ? 1 : 0;
		$profiles = [
			'basic' => $this->basic_data_status($user),
			'avatar' => $this->avatar_status($user),
			'standard' => $this->standard_status($user),
			'dating' => $this->dating_status($user),
			'detail' => $this->detail_status($user),
			'happy' => $this->happy_status($user),
		];
		$invite_status = $user->invite_count >=10 ? 1 : 0;

		foreach( $profiles as $key => $profile )
		{
			if($profile['status'] == 0){
				$profile_status = 0;
			}
		}
		$star = $real_name_status + $education_status + $mobile_status + $charm_status + $invite_status + $profile_status;

		return [
			'star' => $star,
			'profiles' => $profiles,
			'real_name_status' => $real_name_status,
			'education_status' => $education_status,
			'mobile_status' => $mobile_status,
			'charm_status' => $charm_status,
			'invite_status' => $invite_status,
			'profile_status' => $profile_status,
		];
	}
    public function getProfileStatus($user)
    {
        $profiles = [
			'basic' => $this->basic_data_status($user),
			'avatar' => $this->avatar_status($user),
			'standard' => $this->standard_status($user),
			'dating' => $this->dating_status($user),
			'detail' => $this->detail_status($user),
			'happy' => $this->happy_status($user),
		];
        $profile_status = 1;
        foreach( $profiles as $key => $profile )
		{
			if($profile['status'] == 0){
				$profile_status = 0;
			}
		}
        return $profile_status;
    }
	public function basic_data_status ($user)
	{
		$basic_data = config('form_config.basic_data');
		$basic_data_keys = array_keys($basic_data);
		$basic_count = count($basic_data_keys);
		$count = 0;
		foreach( $basic_data_keys as $k => $v )
		{
			if($user->$v)
			{
				$count++;
			}
		}
		/*$schedule = round(($count/$basic_count)* 0.35 * 100) . "%";*/
		if($count == $basic_count)
		{
			return [
				'status' => 1,
				'schedule' => '35%'
			];
		}
		return [
			'status' => 0,
			'schedule' => '0%'
		];
	}
	public function avatar_status($user)
	{
		$status = $user->avatar_url ? 1 : 0;
		$schedule = $user->avatar_url ? "5%"  : '0%';
		return [
			'status' => $status,
			'schedule' => $schedule
		];
	}
	//择偶标准
	public function standard_status ($user)
	{
		$standard_data = config('form_config.standard_data');
		$standard_data_keys = array_keys($standard_data);
		$standard_count = count($standard_data_keys);
		$count = 0;
		$user_standard = UserStandard::findByUid($user->id);
		if($user_standard)
		{
			foreach( $standard_data_keys as $k => $v )
			{
				if($user_standard->$v)
				{
					$count++;
				}
			}
		}

		if($count == $standard_count)
		{
			return [
				'status' => 1,
				'schedule' => '30%'
			];
		}
		return [
			'status' => 0,
			'schedule' => '0%'
		];
	}
	//内心独白
	public function dating_status ($user)
	{
		$user_dating = UserDating::findByUid(Auth::id());
		$status = isset($user_dating->aboutme) ? 1 : 0;
		$schedule = isset($user_dating->aboutme) ? "10%"  : '0%';
		return [
			'status' => $status,
			'schedule' => $schedule
		];
	}
	//个性设置
	public function detail_status ($user)
	{
		$detail_data = config('form_config.detail_data');
		$detail_data_keys = array_keys($detail_data);
		$detail_count = count($detail_data_keys);
		$count = 0;
		$user_detail = UserDetail::findByUid(Auth::id());
		foreach( $detail_data_keys as $k => $v )
		{
			if(isset($user_detail->$v))
			{
				$count++;
			}
		}
		if($count == $detail_count)
		{
			return [
				'status' => 1,
				'schedule' => '10%'
			];
		}
		return [
			'status' => 0,
			'schedule' => '0%'
		];
	}
	//幸福宣言
	public function happy_status ($user)
	{
		$happy_data = config('form_config.happy_data');
		$happy_data_keys = array_keys($happy_data);
		$happy_count = count($happy_data_keys);
		$count = 0;
		$user_happy = UserDetail::findByUid(Auth::id());
		foreach( $happy_data_keys as $k => $v )
		{
			if(isset($user_happy->$v))
			{
				$count++;
			}
		}
		if($count == $happy_count)
		{
			return [
				'status' => 1,
				'schedule' => '10%'
			];
		}
		return [
			'status' => 0,
			'schedule' => '0%'
		];
	}

	/**
	 *  生成邮件验证hash
	 *
	 * @access  public
	 * @param
	 *
	 * @return void
	 */
	function email_hash ($operation, $key,$usage = '',$email = '')
	{
	    if ($operation == 'encode')
	    {
	        $user_id = intval($key);
			$code = time();
			$email_code = EmailCode::create([
				'user_id' => $user_id,
				'code' => $code,
				'is_used' => 0,
				'email' => $email,
				'usage' => $usage
			]);
	        $hash = substr(md5($email_code->id . config('app.hash_code') . $code), 16, 4);
	        return base64_encode($email_code->id . ',' . $hash);
	    }
	    else
	    {
	        $hash = base64_decode(trim($key));

	        $row = explode(',', $hash);
	        if (count($row) != 2)
	        {
	            return 0;
	        }
	        $code_id = intval($row[0]);
	        $salt = trim($row[1]);

	        if ($code_id <= 0 || strlen($salt) != 4)
	        {
	            return 0;
	        }

			$email_code = app(EmailCode::class)->where('id',$code_id)->first(['code']);

	        $pre_salt = substr(md5($code_id . config('app.hash_code') . $email_code->code), 16, 4);

	        if ($pre_salt == $salt)
	        {
	            return $code_id;
	        }
	        else
	        {
	            return 0;
	        }
	    }
	}
	/**
	 *  发送激活验证邮件
	 *
	 * @access  public
	 * @param   int     $user_id        用户ID
	 *
	 * @return boolen
	 */
	function send_email_hash ($user_id,$email,$type = 'validate')
	{
	    $hash = $this->email_hash('encode', $user_id,'validate',$email);
	    switch ($type)
	    {
	    	case 'validate':
	    		$validate_email = config('app.url') . '/identify/validateEmail?hash=' . $hash;
	    		/* 发送激活验证邮件 */
			    $num = Mail::send('emails.activemail', ['validate_email' => $validate_email], function($message) use($email,$validate_email) {
					$message->from(config('mail.from')['address'],config('mail.from')['name']);
				    $message->subject('['.config('app.web_name').'] 您的邮箱激活邮件');
				    $message->to($email);
				});
	    		break;
	    	default:
	    		$validate_email = config('app.url') . '/user/forgetPasswordEmailNext?hash=' . $hash;
	    		/* 发送激活验证邮件 */
			    $num = Mail::send('emails.forget_password_email', ['validate_email' => $validate_email], function($message) use($email,$validate_email) {
					$message->from(config('mail.from')['address'],config('mail.from')['name']);
				    $message->subject('['.config('app.web_name').'] 忘记密码');
				    $message->to($email);
				});
	    		break;
	    }

	    if ($num)
	    {
	        return true;
	    }
	    else
	    {
	        return false;
	    }
	}
	public function getConverts ($user_id,$appends = [])
	{
		return app(Convert::class)->recent()->forUser($user_id)->paginate(20)->appends($appends);
	}
	public function getWeekstarUsers ($sex = 0,$num)
	{
		if(!$sex){
			$users = app(User::class)->take($num)->orderBy('view_count','desc')->get();
		}else{
			$users = app(User::class)->where('sex',$sex)->take($num)->orderBy('view_count','desc')->get();
		}
		return $this->handleUsers($users);
	}
    public function handle_anonymous($user)
    {
        $user->username = '匿名';
        $user->avatar_url = '/images/noavatar/middle.jpg';
        $user->link = 'javascript:;';
        return $user;
    }
    public function getInviters($user_id,$num = 12)
    {
        $users = app(User::class)->where('parent_id',$user_id)->take($num)->orderBy('id','desc')->get();
        return $this->handleUsers($users);
    }
}
