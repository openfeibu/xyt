<?php
namespace Hifone\Services\Repository;

use Hifone\Models\Space;
use Hifone\Models\User;
use Auth;
use Cache;
use DB;
use Input;

class ShareRepository{	
	/**
     * 分享到分享
     * 
     * @example 需要传入的$data值
     *          sid：转发的分享/资源ID
     *          app_name：app名称
     *          content：转发时的内容信息，有时候会有某些标题的资源
     *          body：转发时，自定义写入的内容
     *          type：分享类型（分享原文app_row_table）
     *          comment：是否给原作者评论
     * @param  array  $data
     *                          分享的相关数据
     * @param  string $from
     *                          是否发@给资源作者，默认为share
     * @param  array  $lessUids
     *                          去掉@用户，默认为null
     * @return array  分享操作后，相关反馈信息数据
     */
    public function shareFeed($data, $from = 'share', $lessUids = null)
    {
        // 返回的数据结果集
        $return = array(
                'status' => 0,
                'data' => L('PUBLIC_SHARE_FAILED'),
        ); // 分享失败
                                                                       // 验证数据正确性
        if (empty($data ['sid'])) {
            return $return;
        }

        $stable = t($data ['type']); // 资源所在的表名
        $sid = t($data ['sid']);
        $app = isset($data ['app_name']) ? $data ['app_name'] : 'space' ; // 当前产生分享所属的应用
        if (! $oldInfo = app('sourceRepository')->getSourceInfo($stable, $sid, $app)) {
            $return ['data'] = L('PUBLIC_INFO_SHARE_FORBIDDEN'); // 此信息不可以被分享
            return $return;
        }
        // 内容数据
        $d ['content'] = isset($data ['content']) ? str_replace(config('app.url'), '[SITE_URL]', $data ['content']) : '';
        $d ['body'] = str_replace(config('app.url'), '[SITE_URL]', $data ['body']);
        // 处理分享类型
        $feedType = 'repost'; // 默认为普通的转发格式
        if (! empty($oldInfo ['feedtype']) && ! in_array($oldInfo ['feedtype'], array(
                'post',
                'postimage',
                'postfile',
        ))) {
            $feedType = $oldInfo ['feedtype'];
        }
        if ($app != 'space') { // 非分享类型内容转发
            $oldInfo ['uid'] = $oldInfo ['source_user_info'] ['id'];
            $oldInfo ['sourceInfo'] ['source_id'] = $oldInfo ['id'];
            $feedType = $app == 'albumPhoto' ? 'photo_repost' : $app.'_repost';
        }

        $d ['sourceInfo'] = ! empty($oldInfo ['sourceInfo']) ? $oldInfo ['sourceInfo'] : $oldInfo;

        /* emoji处理 */
        isset($d['sourceInfo']['source_content']) &&
        $d['sourceInfo']['source_content'] = formatEmoji(true, $d['sourceInfo']['source_content']);

        // 是否发送@上级节点
        $isOther = ($from == 'comment') ? false : true;
        // 获取上个节点资源ID
        $d ['curid'] = $data ['curid'];

        // 获取转发原分享信息
        $appId = $oldInfo ['source_id'];
        $appTable = $oldInfo ['source_table'];

        $d ['from'] = isset($data ['from']) ? intval($data ['from']) : 0;
        $d ['latitude'] = isset($data ['latitude']) ? $data ['latitude'] : 0;
        $d ['longitude'] = isset($data ['longitude']) ? $data ['longitude'] : 0;
        $d ['address'] = isset($data ['address']) ? $data ['address'] : 0;
        $data ['comment_old'] = isset($data ['comment_old']) ? $data ['comment_old'] : 0;
        $d ['source_url'] = '';
        if ($res = app('spaceRepository')->put(Auth::id(), $app, $feedType, $d, $appId, $appTable, null, $lessUids, $isOther, 1)) {
            if (($data ['comment'] != 0 || $data ['comment_old'] != 0)) {
                $c ['type'] = 2;
                $c ['app'] = $app;
                $c ['table'] = 'spaces';
                $c ['app_user_id'] = $oldInfo ['user_id'];
                $c ['content'] = ! empty($d ['body']) ? $d ['body'] : $d ['content'];
                $c ['row_id'] = ! empty($oldInfo ['sourceInfo']) ? $oldInfo ['sourceInfo'] ['source_id'] : $appId;
                $c ['client_type'] = getVisitorClient();
                $c ['to_comment_id'] = $c ['to_user_id'] = 0;
                $c ['app_detail_summary'] = $c ['app_detail_url'] = '';
                $notCount = true;
                unlockSubmit();
                $comment_id = app('commentRepository')->addComment($c, true, $notCount, $lessUids);              
            }
            // 渲染数据
            $rdata = $res; // 渲染完后的结果
            $rdata ['feed_id'] = $res ['id'];
            $rdata ['app_row_id'] = $data ['sid'];
            $rdata ['app_row_table'] = $data ['type'];
            $rdata ['app'] = $app;
            $rdata ['is_repost'] = 1;
            $rdata ['from'] = getFromClient($from);                   
            $return ['data'] = $rdata;
            $return ['status'] = 1;
            // 被分享内容“分享统计”数+1，同时可检测出app,table,row_id 的有效性
            
            $tableModel = tableModel($data ['type']);   	
            $tableModel::where('id',$data['sid'])->increment('repost_count');
            if ($data ['curid'] != $data ['sid'] && ! empty($data ['curid'])) {
                $tableModel = tableModel($data ['curtable']);    	
            	$tableModel::where('id',$data['curid'])->increment('repost_count');
            }
        } else {
            $return ['data'] = app('spaceRepository')->getError();
        }

        return $return;
    }
}
