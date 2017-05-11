<?php

namespace Hifone\Services\Repository;

use Hifone\Models\Space;
use Hifone\Models\SpaceDigg;
use Hifone\Models\User;
use Hifone\Models\Comment;
use Hifone\Models\AllReply;
use Hifone\Models\Vote;
use Cache;
use DB;
use Input;
use Auth;
use Illuminate\Support\Facades\View;
use Hifone\Events\Comment\CommentWasAddedEvent;


class CommentRepository{

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
     * @param  array  $map     查询条件
     * @param  string $order   排序条件，默认为id ASC
     * @param  int    $limit   结果集数目，默认为10
     * @param  bool   $isReply 是否显示回复信息
     * @return array  评论列表信息
     */
    public function getCommentList($map = null, $order = 'ASC', $limit = 10, $isReply = false)
    {
        !$map['app'] && $this->_app && ($map['app'] = $this->_app);
        !$map['table'] && $this->_app_table && ($map['table'] = $this->_app_table);
        !isset($map['is_del']) && ($map['is_del'] = 0);
        $map['is_audit'] = 1 ;
        $data['data'] = Comment::where($map)->orderBy('id',$order)->get()->toArray();
       //  $data = Comment::where($map)->orderBy('id',$order)->paginate($limit)->toArray();
        foreach ($data['data'] as $k => &$v) {
	        $v['replyInfo'] = '';
            if (!empty($v['to_comment_id']) && $isReply) {
                $replyInfo = $this->getCommentInfo($v['to_comment_id'], false);
                $v['replyInfo'] = '//@{uid='.$replyInfo['user_info']['user_id'].'|'.$replyInfo['user_info']['uname'].'}：'.$replyInfo['content'];
            }
            $v['user_info'] = app('userRepository')->getUserInfo($v['user_id']);
            /*$groupData = static_cache('groupdata'.$v['user_id']);
            if (!$groupData) {
                $groupData = model('UserGroupLink')->getUserGroupData($v['user_id']);
                if (!$groupData) {
                    $groupData = 1;
                }
                static_cache('groupdata'.$v['user_id'], $groupData);
            }
            $v['user_info']['groupData'] = $groupData;   //获取用户组信息*/
            $v['content'] = parse_html($v['content'].$v['replyInfo']);
            $v['content'] = formatEmoji(false, $v['content']); // 解析emoji
            $v['sourceInfo'] = app('sourceRepository')->getCommentSource($v);
            //$v['data'] = unserialize($v['data']);
            /*$order = strtolower($order);
            if (strpos($order, 'desc')) {
                $v['storey'] = $data['total'] - $k - ($data['current_page'] - 1) * $limit;
            } else {
                $v['storey'] = $k + 1 + ($data['current_page'] - 1) * $limit;
            }*/
            $v['client_type'] = getFromClient($v['client_type'], $v['app']);
        }

        return $data;
    }
    /**
     * 获取评论信息
     * @param  int   $id     评论ID
     * @param  bool  $source 是否显示资源信息，默认为true
     * @return array 获取评论信息
     */
    public function getCommentInfo($id, $source = true)
    {
        $id = intval($id);
        if (empty($id)) {
            $this->error = trans('public.PUBLIC_WRONG_DATA');        // 错误的参数
            return false;
        }
        if ($info = S('comment_info_'.$id)) {
            return $info;
        }
        $map['id'] = $id;
        $info = Comment::where($map)->first()->toArray();
        $info['user_info'] = app('userRepository')->getUserInfo($info['user_id']);
        $info['content'] = $info['content'];
        /* 解析出emoji */
        $info['content'] = formatEmoji(false, $info['content']);
        $source && $info['sourceInfo'] = app('sourceRepository')->getCommentSource($info);

        S('comment_info_'.$id, $info);

        return $info;
    }
	/**
     * 添加评论操作
     * @param  array $data     评论数据
     * @param  bool  $notCount 是否统计到未读评论
     * @param  array $lessUids 除去@用户ID
     * @return bool  是否添加评论成功
     */
    public function addComment($data, $notCount = false, $lessUids = null)
    {

        if (isSubmitLocked()) {

            $this->error = '发布内容过于频繁，请稍后再试！';

            return false;
        }

        /* # 将Emoji编码 */
        $data['content'] = formatEmoji(true, $data['content']);

        $add = $this->_escapeData($data);
        if ($add['content'] === '') {
            $this->error = trans('public.PUBLIC_COMMENT_CONTENT_REQUIRED');        // 评论内容不可为空
            return false;
        }
        $add['is_del'] = 0;
        $add['is_audit'] = 1;
        $add['client_ip'] = get_client_ip();
        $add['client_port'] = get_client_port();
        $data['addComment'] = isset($data['addComment']) ? $data['addComment'] : true;

        if ($res = comment::create($add)) {

	        event(new CommentWasAddedEvent());
            //锁定发布
            lockSubmit();
            $data['comment_id'] = $res->id;
            // 同步到原资源
            /*if ($data ['app'] != 'space' && $data['addComment']) {
                $this->_upateToFrom($data);
            }
            */
            // 被评论内容的“评论统计数”加1，同时可检测出app，table，row_id的有效性
           	$tableModel = tableModel($add['table']);

            $tableModel::where('id',$add['row_id'])->increment('comment_count');
            $tableModel::where('id',$add['row_id'])->increment('comment_all_count');


            // 给应用UID添加一个未读的评论数 原作者
            if (Auth::id() != $add['app_user_id'] && $add['app_user_id'] != '' && $add['app_user_id'] != $add['to_user_id']) {
                if (!$notCount ) {
                   // model('UserData')->updateKey('unread_comment', 1, true, $add['app_user_id']);

                }
            }
            // 回复发送提示信息
            if (!empty($add['to_user_id']) && $add['to_user_id'] != Auth::id()) {
                if (!$notCount) {
                    //model('UserData')->updateKey('unread_comment', 1, true, $add['to_user_id']);
                }
            }

        	// 发邮件
         	if ($add['to_user_id'] != Auth::id() || $add['app_user_id'] != Auth::id() && $add['app_user_id'] != '') {
             	/*$author = app('userRepository')->getUserInfo(Auth::id());
             	$config['name'] = $author['username'];
             	$config['space_url'] = $author['space_url'];
             	$config['face'] = $author['avatar_url'];
             	$sourceInfo = app('sourceRepository')->getCommentSource($add);
             	$config['content'] = parse_html($add['content']);
             	$config['sourceurl'] = $sourceInfo['source_url'];
             	$config['source_content'] = parse_html($sourceInfo['source_content']);
             	$config['source_ctime'] = $sourceInfo['created_at'];*/

             	if (!empty($add['to_user_id']) && $to_user = User::findByUid($add['to_user_id'])) {
                 	// 回复
	                /*$config['comment_type'] = '回复 我 的评论:';
	                $body = L('NOTIFY_COMMENT_CONTENT', $config);  */

	                app('notifier')->batchNotify(
	                    $data ['app'].'_mention',
	                    Auth::user(),
	                    [$to_user],
	                    $res,
	                    $res->content
	                );
             	} else {
                 	// 评论
	                /*$config['comment_type'] = '评论 我 的分享:';
	                $body = L('NOTIFY_COMMENT_CONTENT', $config); */
	                if (!empty($add['app_user_id']) && $to_user = User::findByUid($add['app_user_id'])) {
	                    app('notifier')->batchNotify(
		                    $data ['app'].'_new_comment',
		                    Auth::user(),
		                    [$to_user],
		                    $res,
		                    $res->content
		                );
	                }
            	}

         	}
        }

        $this->error = $res ? L('PUBLIC_CONCENT_IS_OK') : L('PUBLIC_CONCENT_IS_ERROR');         // 评论成功，评论失败

        return $res;
    }
    /**
     * 检测数据安全性
     * @param  array $data 待检测的数据
     * @return array 验证后的数据
     */
    private function _escapeData($data)
    {
        $add['type'] = isset($data['type'])&&!$data['type'] ? $data['type'] : 1;
        $add['app'] = $data['app'];
        $add['table'] = $data['table'];
        $add['row_id'] = intval($data['row_id']);
        $add['app_user_id'] = intval($data['app_user_id']);
        $add['user_id'] = Auth::id();
        $add['content'] = preg_html($data['content']);
        $add['to_comment_id'] = intval($data['to_comment_id']);
        $add['to_user_id'] = intval($data['to_user_id']);
        $add['data'] = isset($data['data']) && !empty($data['data']) ?  serialize($data['data']) : '';
        $add['created_at'] = $_SERVER['REQUEST_TIME'];
        $add['client_type'] = isset($data['client_type']) ? intval($data['client_type']) : getVisitorClient();
        $add['app_detail_summary'] = isset($data['app_detail_summary']) ? t($data['app_detail_summary']) : '';
        $add['app_detail_url'] = isset($data['app_detail_url']) ? $data['app_detail_url'] : '';

        return $add;
    }
	public function _upateToFrom ($data)
	{
		switch ( $data ['app'] )
		{
			case 'vote':
				$postDetail = Vote::where('space_id',$data ['row_id'])->first()->toArray();
				$postDetail['post_from'] = 'vote';
				break;
			default:
				;
				break;
		}

		$data['post_id'] = $postDetail['id'];
        $data['post_user_id'] = $postDetail['user_id'];
        $data['post_from'] = $postDetail['post_from'];
        $data['to_reply_id'] = $data ['to_comment_id'] ? AllReply::where('comment_id',$data ['to_comment_id'])->pluck('id') : 0;
        $data['comment_id'] = $data['comment_id'];
        $data['to_user_id'] = $data['to_user_id'];
        $data['user_id'] = Auth::id();
        $data['content'] = $data['content'];
        $data['created_at'] = date('Y-m-d H:i:s');

        AllReply::create($data);
	}
}
