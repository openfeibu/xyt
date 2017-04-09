<?php

namespace Hifone\Services\Repository;

use Hifone\Models\User;
use Hifone\Models\Wall;
use Cache;
use DB;
use Input;
use Auth;
use Illuminate\Support\Facades\View;

class WallRepository{

	public function getWallList($map = null, $limit = 10)
    {
	    
        $data = app('repository')->model(Wall::class)->where($map)->recent()->paginate($limit)->appends(['post_id'=>$map['post_id'],'addtoend'=>0]);
        foreach ($data as &$v) {
            $v->user_info = app('userRepository')->getUserInfo($v->post_id);
            $v->content = parse_html(h(htmlspecialchars($v->content)));
        }
        return $data;
    }

    public function getWallInfo($id)
    {
        $id = intval($id);
        if (empty($id)) {
            $this->error = trans('public.PUBLIC_WRONG_DATA');        // 错误的参数
            return false;
        }
        if ($info = S('wall_info_'.$id)) {
            return $info;
        }
        $info = Wall::where('id',$id)->first()->toArray();
        $info['user_info'] = app('userRepository')->getUserInfo($info['user_id']);
        $info['content'] = $info['content'];
        /* 解析出emoji */
        $info['content'] = formatEmoji(false, $info['content']);

        S('wall_info_'.$id, $info);

        return $info;
    }
}