<?php

namespace Hifone\Services\Repository;

use Auth;
use Cache;
use DB;
use Log;
use Input;
use Hifone\Models\Space;
use Hifone\Models\User;
use Hifone\Models\Vote;
use Hifone\Models\Blog;
use Hifone\Models\Album;
use Hifone\Models\Reply;
use Hifone\Models\AlbumPhoto;
use Hifone\Models\Thread;
use Hifone\Models\Activity;

class SourceRepository{
	
	public function __construct ()
	{

	}
	/**
     * 获取指定资源，并格式化输出
     *
     * @param  string $table
     *                         资源表名
     * @param  int    $row_id
     *                         资源ID
     * @param  bool   $_forApi
     *                         是否提供API，默认为false
     * @param  string $appname
     *                         自定应用名称，默认为public
     * @return [type] [description]
     */
    public function getSourceInfo($table, $row_id,$appname = 'space')
    {

        $key = $table.$row_id;
        
        if ($info = S('source_info_'.$key)) {
            return $info;
        }
        switch ($table) {
            case 'spaces' :
                $info = $this->getInfoFromSpace($table, $row_id);
                break;
            case 'comment' :
                $info = $this->getInfoFromComment($table, $row_id);
                break;          
            case 'albumPhotos':
                $photo = AlbumPhoto::where('id',$row_id)->first()->toArray();
                $info['id'] = $photo['id'];
                $info['source_user_info'] = app('userRepository')->getUserInfo($photo['user_id']);
                $info['source_url'] = route('album.album_photos',['album_id'=>$photo['album_id']]);
                $uploadCount = AlbumPhoto::where('space_id',$photo['space_id'])->count();
                $info['photo_upload_count'] = $uploadCount;
                $info['source_content'] = ($info['source_user_info'] !== false) ? '上传了'.$uploadCount.'张照片' : '内容已被删除';
				$album = Album::where('id',$photo['album_id'])->first()->toArray();
                $info['source_body'] = $album['name'].'<a class="ico-details" href="'.$info['source_url'].'"></a>';
                $info['title'] = $album['name'];
                $info['space_id'] = $photo['space_id'];
                $info['created_at'] = $photo['created_at'];
                $info['photo_count'] = AlbumPhoto::where('album_id',$photo['album_id'])->count();
                $info['images'] = AlbumPhoto::where('space_id',$photo['space_id'])->lists('image');
                $info['album_url'] = route('album.album_photos',['album_id'=>$photo['album_id']]);
                break;
            case 'votes' :
                $vote = Vote::where('id',$row_id)->first()->toArray();
                $info['id'] = $vote['id'];
                $info['source_user_info'] = app('userRepository')->getUserInfo($vote['user_id']);
                $info['source_url'] = route('vote.show',['id' => $row_id]);
                $info['source_content'] = ($info['source_user_info'] !== false) ? '发表了一个投票' : '内容已被删除';
                $info['source_body'] = $vote ['subject'].'<a class="ico-details" href="'. route('vote.show',['id' => $row_id]).'"></a>';
                $info['space_id'] = $vote['space_id'];
                /*$voteOpts = D('VoteOpt')->where('vote_id='.$row_id)->order('id ASC')->findAll();
                $info['vote_opts'] = $voteOpts;*/
                $info['subject'] = $vote['subject'];
                $info['message'] = $vote['message'];
                $info['created_at'] = $vote['created_at'];
                $info['user_count'] = $vote['user_count'];
                break;
            case 'activities' :
                $activity = Activity::where('id',$row_id)->first()->toArray();
                $info['id'] = $activity['id'];
                $info['source_user_info'] = app('userRepository')->getUserInfo($activity['user_id']);
                $info['source_url'] = route('activity.show',['id' => $row_id]);
                $info['source_content'] = ($info['source_user_info'] !== false) ? '发表了一个活动' : '内容已被删除';
                $info['source_body'] = $activity ['name'].'<a class="ico-details" href="'. route('activity.show',['id' => $row_id]).'"></a>';
                $info['space_id'] = $activity['space_id'];
                $info['name'] = $activity['name'];
                $info['created_at'] = $activity['created_at'];
                break;
            case 'blogs' :
                $blog = Blog::where('id',$row_id)->first()->toArray();
                $info['id'] = $blog['id'];
                $info['source_user_info'] = app('userRepository')->getUserInfo($blog['user_id']);
                $info['source_url'] = route('vote.show',['id' => $row_id]);
                $info['source_content'] = ($info['source_user_info'] !== false) ? '发表了一篇日志' : '内容已被删除';
                $info['source_body'] = $blog ['title'].'<a class="ico-details" href="'. route('blog.show',['id' => $row_id]).'"></a>';
                $info['space_id'] = $blog['space_id'];
                $info['title'] = $blog['title'];
                $info['created_at'] = $blog['created_at'];
                break;
            case 'threads' :
            	$thread = Thread::where('id',$row_id)->first();
            	$info['id'] = $thread->id;
                $info['source_user_info'] = app('userRepository')->getUserInfo($thread->user_id);
                $info['source_url'] = route('thread.show',['id' => $row_id]);
                $info['source_content'] = ($info['source_user_info'] !== false) ? '发表了一个话题' : '内容已被删除';
                $info['source_body'] = $thread->subject.'<a class="ico-details" href="'. route('vote.show',['id' => $row_id]).'"></a>';
                $info['space_id'] = $thread->space_id;
                $info['title'] = $thread->title;
                $info['node_name'] = $thread->node->name;
                $info['node_id'] = $thread->node->id;
                $info['body_original'] = $thread->body_original;
                $info['created_at'] = $thread->created_at;
                $info['user_count'] = $thread->reply_count;
            	break;
            case 'replies' :
            	$reply = Reply::where('id',$row_id)->first();
            	$info['id'] = $reply->id;
                $info['source_user_info'] = app('userRepository')->getUserInfo($reply->user_id);
                $thread = Thread::where('id',$reply->thread_id)->first();
                $info['author'] = app('userRepository')->getUserInfo($thread->user_id);
                $info['source_url'] = route('thread.show',['id' => $row_id]);
                $info['source_content'] = ($info['source_user_info'] !== false && $info['author'] !== false) ? '回复了'.'<a class="ico-details" href="'. route('user.home',$thread->user_id).'">'.$info['author']['username'].'</a> 的话题 '.'<a class="ico-details" href="'.$info['source_url'].'">'. $thread->title.'</a>': '内容已被删除';
                $info['space_id'] = $reply->space_id;
                $info['created_at'] = $reply->created_at;
            	break;
            default :
                // 单独的内容，通过此路径获取资源信息
                // 通过应用下的{$appname}ProtocolModel.Class.php模型里的getSourceInfo方法，来写各应用的来源数据获取方法
                $appname = strtolower($appname);
                $name = ucfirst($appname);
                $dao = D($name.'Protocol', $appname, false);
                if (method_exists($dao, 'getSourceInfo')) {
                    $info = $dao->getSourceInfo($row_id);
                }
                unset($dao);

                // 兼容旧方案
                if (!$info) {
                    $modelArr = explode('_', $table);
                    $model = '';
                    foreach ($modelArr as $v) {
                        $model .= ucfirst($v);
                    }
                    $dao = D($model, $appname);
                    if (method_exists($dao, 'getSourceInfo')) {
                        $info = $dao->getSourceInfo($row_id);
                    }
                }
                break;
        }
        //$info['is_space'] =  $table == 'spaces' ? 1 : 0;
        $info ['source_table'] = $table;
        $info ['source_id'] = $row_id;
        S('source_info_'.$key, $info);

        return $info;
    }

    /**
     * 从space中提取资源数据
     *
     * @param  string $table
     *                        资源表名
     * @param  int    $row_id
     *                        资源ID
     * @return array  格式化后的资源数据
     */
    private function getInfoFromSpace($table, $row_id)
    {
	    Log::debug('row_id:'.$row_id);
        $info = app('spaceRepository')->getFeedInfo($row_id);
        $info ['source_user_info'] = app('userRepository')->getUserInfo($info ['user_id']);
        $info ['source_user'] = $info ['user_id'] == Auth::id() ? trans('public.PUBLIC_ME') : $info ['source_user_info'] ['space_link']; // 我
        $info ['source_type'] = trans('public.PUBLIC_WEIBO');
        $info ['source_title'] = ''; // 分享title暂时为空
        $info ['source_url'] = '';
        $info ['source_content'] = $info ['content'];
        $info ['created_at'] = $info ['created_at'];
        $info ['is_del'] = $info ['is_del'];
        unset($info ['content']);

        return $info;
    }
    /**
     * 从评论中提取资源数据
     *
     * @param  string $table
     *                        资源表名
     * @param  int    $row_id
     *                        资源ID
     * @return array  格式化后的资源数据
     */
    private function getInfoFromComment($table, $row_id)
    {
        $_info = app('commentRepository')->getCommentInfo($row_id, true);
        $info ['uid'] = $_info ['app_user_id'];
        $info ['row_id'] = $_info ['row_id'];
        $info ['is_audit'] = $_info ['is_audit'];
        $info ['source_user'] = $info ['uid'] == Auth::id() ? trans('public.PUBLIC_ME') : $_info ['user_info'] ['space_link']; // 我
        $info ['comment_user_info'] = app('userRepository')->getUserInfo($_info ['user_info'] ['uid']);
        $info ['source_user_info'] = app('userRepository')->getUserInfo($info ['uid']);
        $info ['source_type'] = trans('public.PUBLIC_STREAM_COMMENT'); // 评论
        $info ['source_content'] = $_info ['content'];
        $info ['source_url'] = $_info ['sourceInfo'] ['source_url'];
        $info ['ctime'] = $_info ['ctime'];
        $info ['app'] = $_info ['app'];
        $info ['sourceInfo'] = $_info ['sourceInfo'];
        // 分享title暂时为空
        $info ['source_title'] =  $_info ['user_info'] ['space_link'];

        return $info;
    }
    public function getCommentSource($data)
    {
        if ($data['table'] == 'spaces' || $data['table'] == 'comments' || empty($data['app_detail_summary']) ) {
            return $this->getSourceInfo($data['table'], $data['row_id'], $data['app']);
        }
        $info['source_user_info'] = app('userRepository')->getUserInfo($data['app_user_id']);
        $info['source_url'] = $data['app_detail_url'];
        $info['source_body'] = t($data['app_detail_summary']);
        return $info;
    }
}
