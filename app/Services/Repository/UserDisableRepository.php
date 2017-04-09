<?php

namespace Hifone\Services\Repository;

use Hifone\Models\User;
use Hifone\Models\UserDisable;
use Cache;
use DB;

class UserDisableRepository{
	 // 最近错误信息
    protected $error = '';
    
	public function __construct ()
	{
		
	}
	 public function isDisableUser($uid, $type = 'login')
    {
        if (!in_array($type, array('login', 'post'))) {
            $type = 'login';
        }
        if (empty($uid)) {
            return false;
        }
        $key = 'is_disable_user_'.$type.'_'.$uid;
        $result = S($key);
        if ($result == false) {
            $time = time();
            $data = UserDisable::where('user_id',$uid)
            					->where('type',$type)
            					->where('start_time','<',$time)
            					->where('end_time','>',$time)
            					->first();

            if (empty($data)) {
                $result['status'] = false;
            } else {
                $result['status'] = true;
                $result['time'] = $data['end_time'];
            }
            S($key, $result);
        }

        if ($result['status'] && $result['time'] < time()) {
            S($key, null);

            return false;
        }

        return $result['status'];
    }
}