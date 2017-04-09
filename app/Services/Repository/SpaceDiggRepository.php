<?php

namespace Hifone\Services\Repository;

use Hifone\Models\Space;
use Hifone\Models\User;
use Hifone\Models\SpaceDigg;
use Auth;
use Cache;
use DB;
use Input;

class SpaceDiggRepository{

	protected $error;
	
	public function __construct ()
	{
		
	}
	public function getLastError()
    {
        return $this->error;
    }
    
   	public function checkIsDigg ($space_ids,$uid)
   	{
	   	$res = array();
   		if (! is_array($space_ids)) {
            $space_ids = array(
                    $space_ids,
            );
        }
        $space_ids = array_filter($space_ids);

        $digg = S('user_digg_'.$uid);

        if (!$digg) {
            $list = SpaceDigg::where('user_id',$uid);
            if ($space_ids) {
	            $list = $list->whereIn('space_id',$space_ids);
            }
            $list = $list->get()->toArray();
            foreach ($list as $v) {
                $res [$v ['space_id']] = 1;
            }
            $this->setDiggCache($uid);
        } else {
            foreach ($space_ids as $v) {
                in_array($v, $digg) && $res[$v] = 1;
            }
        }

        return $res;
   	}
   	private function setDiggCache($uid, $feedId = null, $type = 'add')
    {
        $key = 'user_digg_'.$uid;
        $data = S($key);

        if (!$data) {
            $data = SpaceDigg::select('space_id')->where('user_id',$uid)->get()->toArray();
            $data = array_column($data, 'space_id');
        }
   
        if ($type === 'add') {
            array_push($data, $feedId);
        } elseif ($type === 'del') {
            $s_key = array_search($feedId, $data);
            if ($s_key !== false) {
                unset($data[$s_key]);
            }
        }
        
        S($key, array_unique($data));
    }
    public function addDigg($space_id, $uid)
    {

        $data = array(
            'user_id' => $uid,
            'space_id' => $space_id,
        );

        if (SpaceDigg::where($data)->count()) {
            $this->error = '你已经赞过';

            return false;
        }
        $res = SpaceDigg::create($data);

       	if ($res) {
			$feed = app('sourceRepository')->getSourceInfo('spaces', $space_id);
	        Space::where('id',$space_id)->increment('digg_count');
	        app('spaceRepository')->cleanCache($space_id);
	        //app('userRepository')->updateKey('unread_digg', 1, true, $feed['uid']);

	        //增加积分
	        //model('Credit')->setUserCredit($mid, 'digg_weibo');
	        //model('Credit')->setUserCredit($feed['uid'], 'digged_weibo');
		}
            
        return $res;
    }

    public function delDigg($space_id, $uid)
    {
        $data['space_id'] = $space_id;
        $data['user_id'] = $uid;


        $isExit = SpaceDigg::select('id')->where($data)->first();
        if (!$isExit) {
            $this->error = '取消赞失败，您可能已取消过赞信息';

            return false;
        }

        $res = SpaceDigg::where($data)->delete();

        if ($res) {
            $feed = app('sourceRepository')->getSourceInfo('spaces', $space_id);
            Space::where('id',$space_id)->decrement('digg_count');
           // model('UserData')->updateKey('unread_digg', -1, true, $feed['uid']);
            app('spaceRepository')->cleanCache($space_id);

            $this->setDiggCache(Auth::id(), $space_id, 'del');
        }

        return $res;
    }
}