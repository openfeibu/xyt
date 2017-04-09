<?php

namespace Hifone\Services\Repository;

use Hifone\Models\User;
use Hifone\Models\AllReply;
use Cache;
use DB;
use Input;
use Auth;
use Illuminate\Support\Facades\View;

class AllReplyRepository{

	public function getReplyList($map = null, $limit = 10)
    {
	    
        $data = app('repository')->model(AllReply::class)->where($map)->recent()->paginate($limit);
        // // TODO:后续优化
        foreach ($data as &$v) {
            $v->user_info = app('userRepository')->getUserInfo($v->user_id);
            //$v['user_info']['groupData'] = model('UserGroupLink')->getUserGroupData($v['uid']);   //获取用户组信息
            $v->content = parse_html(h(htmlspecialchars($v->content)));
        }
		$data->count = app('repository')->model(AllReply::class)->where($map)->count();
        return $data;
    }
    /**
     * 获取评论信息
     * @param  int   $id     评论ID
     * @param  bool  $source 是否显示资源信息，默认为true
     * @return array 获取评论信息
     */
    public function getReplyInfo($id)
    {
        $id = intval($id);
        if (empty($id)) {
            $this->error = trans('public.PUBLIC_WRONG_DATA');        // 错误的参数
            return false;
        }
        if ($info = S('reply_info_'.$id)) {
            return $info;
        }
        $info = AllReply::where('id',$id)->first()->toArray();
        $info['user_info'] = app('userRepository')->getUserInfo($info['user_id']);
        $info['content'] = $info['content'];
        /* 解析出emoji */
        $info['content'] = formatEmoji(false, $info['content']);

        S('reply_info_'.$id, $info);

        return $info;
    }
}