<?php

namespace Hifone\Services\Repository;

use Hifone\Models\User;
use Hifone\Models\Space;
use Hifone\Models\Attach;
use Hifone\Models\SpaceDigg;
use Cache;
use DB;
use Input;
use Auth;
use Log;
use Hifone\Events\Space\SpaceWasAddedEvent;
use Illuminate\Support\Facades\View;

class SpaceRepository{

	 // 最近错误信息
    protected $error = '';

    private $limitnums = 10;
    
	public function __construct ()
	{
		
	}
	public function getError()
    {
        return $this->error;
    }
	/**
     * 添加说说
     * @param  int    $uid       操作用户ID
     * @param  string $app       说说应用类型，默认为space
     * @param  string $type      说说类型，
     * @param  array  $data      说说相关数据
     * @param  int    $app_id    应用资源ID，默认为0
     * @param  string $app_table 应用资源表名，默认为feed
     * @param  array  $extUid    额外用户ID，默认为null
     * @param  array  $lessUids  去除的用户ID，默认为null
     * @param  bool   $isAtMe    是否为进行发送，默认为true
     * @return mix    添加失败返回false，成功返回新的说说ID
     */
    public function put($uid, $app = 'space', $type = 'space', $data = array(), $app_id = 0, $app_table = 'spaces', $extUid = null, $lessUids = null, $isAtMe = true, $is_repost = 0)
    {

        //检测用户是否被禁言
        if($isDisabled = app('userDisableRepository')->isDisableUser($uid,'post'))
        {
            $this->error = '您已经被禁言了..';
            return false;
        }
        if (isSubmitLocked()) {
            $this->error = '发布内容过于频繁，请稍后再试';

            return false;
        }

        // 判断数据的正确性
        if (!$uid || $type == '') {
            $this->error = trans('public.PUBLIC_ADMIN_OPRETING_ERROR');

            return false;
        }
        if (strpos($type, 'postvideo') !== false) {
            $type = 'postvideo';
        }

        //说说类型合法性验证 - 临时解决方案
        $checkType = array('post', 'repost', 'postvideo', 'postfile', 'postimage', 'weiba_post', 'weiba_repost', 'long_post', 'photo_post', 'photo_repost', 'vote_post', 'vote_repost', 'event_post', 'event_repost', 'blog_post', 'blog_repost', 'poster_post', 'poster_repost','thread_post','thread_repost','thread_reply_post', 'activity_post');
        if (!in_array($type, $checkType)) {
            $type = 'post';
        }
        //应用类型验证 用于说说框 - 临时解决方案
        $checkApp = array('w3g', 'public', 'weiba', 'tipoff', 'photo', 'vote', 'event', 'blog', 'poster','space','albumPhoto','thread','activity');
        if (!in_array($app, $checkApp)) {
            $app = 'space';
            $type = 'post';
            $app_table = 'spaces';
        }
        // 添加space表记录
        $data['user_id'] = $uid;
        $data['app'] = $app;
        $data['type'] = $type;
        $data['app_row_id'] = $app_id;
        $data['app_row_table'] = $app_table;
        $data['from'] = isset($data['from']) ? intval($data['from']) : 0;
        $data['is_del'] = $data['comment_count'] = $data['repost_count'] = 0;
        $data['is_repost'] = $is_repost;
		$data['is_audit'] = 1;
        $data['digg_count'] = 0;
        $data['body'] = isset($data['body']) ? $data['body'] : '';
        $data['source_url'] = isset($data['source_url']) ? $data['source_url'] : '';
        // 说说内容处理

        $content = $this->formatFeedContent($data['body'],140);
        $data['body'] = $content['body'];
        $data['content'] = $content['content'];
        
        //分享到说说的应用资源，加入原资源链接
        $data['body'] .= $data['source_url'];
        $data['content'] .= $data['source_url'];

        if ($type == 'postvideo') {
            
            $typedata = app('videoService')->_weiboTypePublish(Input::get('videourl'));

            if ($typedata && $typedata['flashvar'] && $typedata['flashimg']) {
                $data = array_merge($data, $typedata);
            } else {
                $data['type'] = 'post';
            }

        }
        // 目前处理方案格式化数据
        $data['content'] = str_replace(chr(31), '', $data['content']);       
        $data['feed_data'] = serialize($data);
        $data['feed_content'] =  str_replace(chr(31), '', $data['body']) ;
        $data['client_ip'] = get_client_ip();
        $data['client_port'] = get_client_port();
        $data['created_at'] = date("Y-m-d H:i:s");
        // 添加说说信息
        $space = Space::create($data);
        $space_id = $space->id;
        if (!$space_id) {
            return false;
        }

        // 添加说说成功后
        if ($space_id) {
            //锁定发布
            lockSubmit();

            $data['client_ip'] = get_client_ip();
            $data['space_id'] = $data['id'] = $space_id;
            $data['feed_data'] = serialize($data);
            // 主动创建渲染后的缓存
            $return = $this->setFeedCache($data);
            $return['user_info'] = app('userRepository')->getUserInfo($uid);
           // $return['GroupData'] = model('UserGroupLink')->getUserGroupData($uid);   //获取用户组信息
            $return['space_id'] = $space_id;
            $return['app_row_id'] = $data['app_row_id'];
            $return['is_audit'] = $data['is_audit'];
            // 统计数修改
            if($app == 'space'){
	            app('userRepository')->updateKey('space_count', 1,true,$uid);
            }
            //更新附件信息
            $attach_info['app_name'] = 'space';
            $attach_info['table'] = 'spaces';
            $attach_info['row_id'] = $space_id;
            if(isset($data['attach_id'])){
	            app(Attach::class)->whereIn('id',$data['attach_id'])->update($attach_info);
            }
            if (!$return) {
                $this->error = trans('public.PUBLIC_CACHE_FAIL');                // Feed缓存写入失败
            }
            return $return;
        } else {
            $this->error = trans('public.PUBLIC_ADMIN_OPRETING_ERROR');        // 操作失败
            return false;
        }
    }
    /**
     * 截取说说内容，将说说中的URL替换成{ts_urlX}进行字符数目统计
     * @param  string $content   说说内容
     * @param  string $weiboNums 说说截取数目，默认为0
     * @return array  格式化后的说说内容，body与content
     */
    public function formatFeedContent($content, $weiboNums = 0)
    {
        // 拼装数据，如果是评论再转发、回复评论等情况，需要额外叠加对话数据
        $content = str_replace(config('app.url'), '[SITE_URL]', preg_html($content));
        // 格式化说说信息 - URL
        $content = preg_replace_callback('/((?:https?|mailto|ftp):\/\/([^\x{2e80}-\x{9fff}\s<\'\"“”‘’，。}]*)?)/u', '_format_feed_content_url_length', $content);
        $replaceHash = Cache::pull('replaceHash');
        // 获取用户发送的内容，仅仅以//进行分割
        $scream = explode('//', $content);
        // 截取内容信息为说说内容字数 - 重点     
        $feedNums = $weiboNums;
        $body = array();
        // 还原URL操作
        $patterns = $replaceHash ? array_keys($replaceHash) : '';
        $replacements = $replaceHash ? array_values($replaceHash) : '';
        foreach ($scream as $value) {
            $tbody[] = $value;
            $bodyStr = implode('//', $tbody);
            if (get_str_length(ltrim($bodyStr)) > $feedNums) {
                break;
            }
            $body[] = str_replace($patterns, $replacements, $value);
            unset($bodyStr);
        }
        $data['body'] = implode('//', $body);
        // 获取用户发布内容
        $scream[0] = str_replace($patterns, $replacements, $scream[0]);
        $data['content'] = trim($scream[0]);

        return $data;
    }
     /**
     * 生成指定分享的缓存
     * @param array $value   分享相关数据
     * @param array $space_id 分享ID数组
     */
    private function setFeedCache($value = array(), $space_id = array())
    {
        if (!empty($space_id)) {
            !is_array($space_id) && $space_id = explode(',', $space_id);
            $list = Space::whereIn('id',$space_id)->get()->toArray();
            $r = array();
            foreach ($list as &$v) {
                // 格式化数据模板
                $parseData = $this->__paseTemplate($v);
               // $v['info'] = $parseData['info'];
                $v['title'] = $parseData['title'];
                $v['body'] = $parseData['body'];
                $v['api_source'] = $parseData['api_source'];
              //  $v['actions'] = $parseData['actions'];
                $v['user_info'] = $parseData['userInfo'];
              //  $v['GroupData'] = model('UserGroupLink')->getUserGroupData($v['uid']);
                $v['content_txt'] = $parseData['content_txt'];
                Cache::put('fd_'.$v['id'], $v,1);            // 1分钟缓存
                $r[$v['id']] = $v;
            }

            return $r;
        } else {
            // 格式化数据模板
            $parseData = $this->__paseTemplate($value);
          //  $value['info'] = $parseData['info'];
            $value['title'] = $parseData['title'];
            $value['body'] = $parseData['body'];
            $value['api_source'] = $parseData['api_source'];
            $value['actions'] = $parseData['actions'];
            $value['user_info'] = $parseData['userInfo'];
         //   $value['GroupData'] = model('UserGroupLink')->getUserGroupData($value['uid']);
            $value['content_txt'] = $parseData['content_txt'];
            Cache::put('fd_'.$value['space_id'], $value,1);        // 1分钟缓存
            return $value;
        }
    }
    /**
     * 解析分享模板标签
     * @param  array $_data 分享的原始数据
     * @return array 解析分享模板后的分享数据
     */
    private function __paseTemplate($_data)
    {
	   
        // 获取作者信息
        $user = app('userRepository')->getUserInfo($_data['user_id']);
        // 处理数据
        $_data['data'] = unserialize($_data['feed_data']);
        // 模版变量赋值
        $var = $_data['data'];
        $var['attachInfo'] = [];
   		 if (!empty($var['attach_id'])) {
            $var['attachInfo'] = app('attachService')->getAttachByIds($var['attach_id']);;
			
            foreach ($var['attachInfo'] as $ak => $av) {
                $_attach = array(
                            'attach_id' => $av['attach_id'],
                            'attach_name' => $av['name'],
                            'attach_url' => getImageUrl($av['save_path'].$av['save_name']),
                            'extension' => $av['extension'],
                            'size' => $av['size'],
                        );
                if ($_data['type'] == 'postimage' || $_data['type'] == 'postvideo') {
                    $_attach['attach_small'] = getImageUrl($av['save_path'].$av['save_name'], 120, 120, true);
                    $_attach['attach_medium'] = getImageUrl($av['save_path'].$av['save_name'], 240);
                    $_attach['attach_middle'] = getImageUrl($av['save_path'].$av['save_name'], 740);
                }
                $var['attachInfo'][$ak] = $_attach;
            }
        }
        $var['uid'] = $_data['user_id'];
        $var['actor'] = "<a href='".route('user.home', [$user['id']])."' class='name' event-node='face_card' uid='{$user['id']}'>{$user['username']}</a>";
        $var['actor_uid'] = $user['id'];
        $var['actor_uname'] = $user['username'];
        $var['feedid'] = $_data['id'];
        //需要获取资源信息的分享：所有类型的分享，只要有资源信息就获取资源信息并赋值模版变量，交给模版解析处理
        if (!empty($_data['app_row_id'])) {
            empty($_data['app_row_table']) && $_data['app_row_table'] = 'spaces';
            $var['sourceInfo'] = app('sourceRepository')->getSourceInfo($_data['app_row_table'], $_data['app_row_id'], $_data['app']);
           // $var['sourceInfo']['groupData'] = model('UserGroupLink')->getUserGroupData($var['sourceInfo']['source_user_info']['uid']);
        }
		// 解析Feed模版
		$feed_content = view('space.conf.'.$_data['type'],$var)->__toString();
        //输出模版解析后信息
        $return['content_txt'] = $_data['data']['body'];
        $return['attach_info'] = $var['attachInfo'];
        $return['userInfo'] = $user;
       // $return['actor_groupData'] = $var['actor_groupData'];
        $return['title'] = $var['actor'];
        $return['body'] = parse_html($feed_content);
        $return['api_source'] = isset($var['sourceInfo']) ? $var['sourceInfo'] : '' ;
        $return['actions'] = array(
            'comment' => true,
            'repost' => true,
            'like' => false,
            'favor' => true,
            'delete' => true,
        );
        //验证转发的原信息是否存在
        /*if (!$this->_notDel($_data['app'], $_data['type'], $_data['app_row_id'])) {
            $return['body'] = L('PUBLIC_INFO_ALREADY_DELETE_TIPS');                // 此信息已被删除〜
        }
*/
        return $return;
    }
    /**
     * 获取分享列表
     * @param  array  $map   查询条件
     * @param  int    $limit 结果集数目，默认为10
     * @param  string $order 排序字段
     * @return array  分享列表数据
     */
    public function getList($feedlist, $limit = 10, $order = null,$page_paramter)
    {
   		$order = !empty($order) ? $order : array('0' => array('id' =>'desc')); 
  		$feedlist = orderHandle($feedlist,$order);
 		$feedlist = $feedlist->paginate($limit)->appends(array_filter($page_paramter));	
 		$pageHtml = with(new \Hifone\Foundations\Pagination\CustomerPresenter($feedlist))->render();	
 		$feedlist = $feedlist->toArray();
        $space_ids = getSubByKey($feedlist['data'], 'id');   
        $feedlist['pageHtml'] = $pageHtml;
        $feedlist['data'] = $this->getFeeds($space_ids);
        return $feedlist;
    }

    /**
     * 获取给定分享ID的分享信息
     * @param  array $space_ids 分享ID数组
     * @return array 给定分享ID的分享信息
     */
    public function getFeeds($space_ids)
    {
		
        $feedlist = $cacheList = array();
        $space_ids = array_filter(array_unique($space_ids));

        // 获取数据
        if (count($space_ids) > 0) {
	        $cacheList = getList('fd_', $space_ids);          
        } else {
            return false;
        }
		
        // 按照传入ID顺序进行排序
        foreach ($space_ids as $key => $v) {
            if ($cacheList[$v]) {
                $feedlist[$key] = $cacheList[$v];
            } else {
                $feed = $this->setFeedCache(array(), $v);
                $feedlist[$key] = $feed[$v];
            }
        }

        return $feedlist;
    }
    /**
     * 获取指定说说的信息，用于资源模型输出???
     * @param  int   $id     说说ID
     */
    public function getFeedInfo($id)
    {
        $data = Cache::get('feed_info_'.$id);
        if ($data) {
            return $data;
        }
        Log::debug($id);
		$data = Space::where('id',$id)->first()->toArray();
        $fd = unserialize($data['feed_data']);
        $userInfo = app('userRepository')->getUserInfo($data['user_id']);
        $data['content'] = $fd['body'];
        $data['uname'] = $userInfo['username'];
       // $data['user_group'] = $userInfo['api_user_group'];
     //   $data['user_gicon'] = $userInfo['group_icon_only'];
        $data['avatar_big'] = $data['avatar_middle'] =  $data['avatar_small'] = $userInfo['avatar_url'];

        unset($data['feed_data']);

        // 分享转发
        if ($data['type'] == 'repost') {
            $data['transpond_id'] = $data['app_row_id'];
            $data['transpond_data'] = $this->getFeedInfo($data['transpond_id']);
        }
       
        $data['has_attach'] = 0;

		// 附件处理
        if (!empty($fd['attach_id'])) {
            $data['has_attach'] = 1;
            $attach = app('attachService')->getAttachByIds($fd['attach_id']);
            foreach ($attach as $ak => $av) {
	            
                $_attach = array(
                            'attach_id' => $av['attach_id'],
                            'attach_name' => $av['name'],
                            'attach_url' => getImageUrl($av['save_path'].$av['save_name']),
                            'extension' => $av['extension'],
                            'size' => $av['size'],
                        );
                if ($data['type'] == 'postimage') {
                    $_attach['attach_small'] = getImageUrl($av['save_path'].$av['save_name'], 120, 120, true);
                    $_attach['attach_medium'] = getImageUrl($av['save_path'].$av['save_name'], 240);
                    $_attach['attach_middle'] = getImageUrl($av['save_path'].$av['save_name'], 740);
                    $_attach['attach_middle_box'] = getImageUrl($av['save_path'].$av['save_name'], 240, 240, true);
                }
                $data['attach'][] = $_attach;
            }
        } else {
            $data['has_attach'] = 0;
        }

        if ($data['type'] == 'postvideo') {
            
            $data['host'] = $fd['host'];
            $data['flashvar'] = $fd['flashvar'];
            $data['source'] = $fd['source'];
            $data['flashimg'] = $fd['flashimg'];
            $data['title'] = $fd['title'];

        }

        $data['feedType'] = $data['type'];

        //获取赞过分享的人
        $diggs = SpaceDigg::where('space_id',$id)->orderBy('id','DESC')->take(10)->get()->toArray();
        foreach ($diggs as &$v) {
            $v['user'] = app('userRepository')->getUserInfo($v['user_id']);
        }
        $data['diggs'] = $diggs;

        // 分享详细信息
        $feedInfo = $this->get($id);
        $data['source_body'] = $feedInfo['body'];
        $data['api_source'] = $feedInfo['api_source'];
        //一分钟缓存
        Cache::put('feed_info_'.$id, $data, 1);

        return $data;
    }
    /**
     * 获取指定分享的信息
     * @param  int $space_id 分享ID
     * @return mix 获取失败返回false，成功返回分享信息
     */
    public function get($space_id)
    {
        $feed_list = $this->getFeeds(array($space_id));
        if (!$feed_list) {
            $this->error = trans('public.PUBLIC_INFO_GET_FAIL');            // 获取信息失败
            return false;
        }

        return array_pop($feed_list);
    }
    /**
     * 清除指定用户指定分享的列表缓存
     * @param array $space_ids 分享ID数组，默认为空
     * @param int   $uid      用户ID，默认为空
     */
    public function cleanCache($space_ids = array(), $uid = '')
    {
        if (!empty($uid)) {
            Cache::forget('fd_foli_'.$uid);
            Cache::forget('fd_uli_'.$uid);
        }
        if (empty($space_ids)) {
            return true;
        }
        if (is_array($space_ids)) {
            foreach ($space_ids as $v) {
                Cache::forget('fd_'.$v);
                Cache::forget('feed_info_'.$v);
                Cache::forget('feed_info_api_'.$v);
            }
        } else {
            Cache::forget('fd_'.$space_ids);
            Cache::forget('feed_info_'.$space_ids);
            Cache::forget('feed_info_api_'.$space_ids);
        }
    }
     /**
     * 获取分享数据，渲染分享显示页面
     *
     * @param  array  $var
     *                     分享数据相关参数
     * @param  string $tpl
     *                     渲染的模板
     * @return array  获取分享相关模板数据
     */
    public function getData(array $var, $tpl = 'FeedList')
    {    
	    isset($var['limitnums']) && intval($var['limitnums']) !=0 && $this->limitnums = $var['limitnums'];
	    isset($var['page_paramter']) && $this->limitnums = $var['limitnums'];
	    if(isset($var['page_paramter']))
	    {
		    $page_paramter = $var['page_paramter'];
	    }else{
		    $page_paramter = [];
	    }
        // # 安全处理
        $var['feed_key'] = t($var['feed_key']);

        // # 不存在默认赋值1
        isset($var['cancomment']) or $var['cancomment'] = 1;

        // # 模式
        $var['cancomment_old_type'] = array('post', 'repost', 'postimage', 'vote_post', 'vote_repost', 'photo_post', 'photo_repost');

        // # 合并配置
        $var = array_merge($var,config('system_config.feed'));

        $map = $list = array();
        
        $type = isset($var ['new']) ? 'new'.$var ['type'] : $var ['type']; // 最新的分享与默认分享类型一一对应
		
        switch ($type) {
            case 'following' : // 我关注的
                if (! empty($var ['feed_key'])) {
                    // 关键字匹配 采用搜索引擎兼容函数搜索 后期可能会扩展为搜索引擎
                    $list = model('Feed')->searchFeed($var ['feed_key'], 'following', $var ['loadId'], $this->limitnums);
                } else {
                    $feedlist = Space::select('id')->where('is_audit',1);
                    if (isset($var ['loadId']) && $var ['loadId'] > 0) { // 非第一次
                        $feedlist = $feedlist->where('id','<',intval($var ['loadId']));
                    }
                    if (isset($var ['feed_type']) &&! empty($var ['feed_type'])) {
                        if ($var ['feed_type'] == 'post') {
                            $feedlist = $feedlist->where('is_repost',0);
                        } elseif ($var ['feed_type'] == 'repost') {
                            $feedlist = $feedlist->where('type','like','%repost');
                        } else {
	                        $feedlist = $feedlist->where('type',t($var ['feed_type']));
                        }
                    }
                    if (isset($var ['app']) &&! empty($var ['app'])) {

                        $feedlist = $feedlist->where('app',t($var ['app']));

                    }				
                    // 设定可查看的关注分享总数，可以提高大数据量下的查询效率
                    $max = null;//1000;
                    $list = $this->getFollowingFeed($feedlist, $this->limitnums, '','', $max,$page_paramter);
                }
                break;
            case 'union' : // 我的人脉
                if (! empty($var ['feed_key'])) {
                    // 关键字匹配 采用搜索引擎兼容函数搜索 后期可能会扩展为搜索引擎
                    $list = model('Feed')->searchFeed($var ['feed_key'], 'union', $var ['loadId'], $this->limitnums);
                } else {
	               
                    $where = ' a.is_audit=1 AND a.is_del = 0 ';
                    if ($var ['loadId'] > 0) { // 非第一次
                        $where .= " AND a.id < '".intval($var ['loadId'])."'";
                    }
                    if (! empty($var ['feed_type'])) {
                        if ($var ['feed_type'] == 'post') {
                            $where .= ' AND a.is_repost = 0';
                        } elseif ($var ['feed_type'] == 'repost') {
                            $where .= " AND a.type LIKE '%repost'";
                        } else {
                            $where .= " AND a.type = '".t($var ['feed_type'])."'";
                        }
                    }
                    
                    // 设定可查看的关注分享总数，可以提高大数据量下的查询效率
                    $max = null;//1000;
                    $list = model('Feed')->getUnionFeed($where, $this->limitnums, '', $var ['fgid'], $max);
                }
                break;
            case 'all' : // 所有的 --正在发生的
                if (! empty($var ['feed_key'])) {
                    // 关键字匹配 采用搜索引擎兼容函数搜索 后期可能会扩展为搜索引擎
                    $list = model('Feed')->searchFeed($var ['feed_key'], 'all', $var ['loadId'], $this->limitnums);
                } else {
	                $feedlist = Space::select('id')->where('is_audit',1);
                    if (isset($var ['loadId']) && $var ['loadId'] > 0) { // 非第一次
                        $feedlist = $feedlist->where('id','<',intval($var ['loadId']));
                    }
                    if (isset($var ['feed_type']) &&! empty($var ['feed_type'])) {
                        if ($var ['feed_type'] == 'post') {
                            $feedlist = $feedlist->where('is_repost',0);
                        } elseif ($var ['feed_type'] == 'repost') {
                            $feedlist = $feedlist->where('type','like','%repost');
                        } else {
	                        $feedlist = $feedlist->where('type',t($var ['feed_type']));
                        }
                    }
                     if (isset($var ['app']) &&! empty($var ['app'])) {

                        $feedlist = $feedlist->where('app',t($var ['app']));

                    }						
                    // 设定可查看的全站分享总数，可以提高大数据量下的查询效率
                    $max = null;//10000;
                    $list = $this->getList($feedlist, $this->limitnums, '', $page_paramter);
                }
                break;
            case 'userSpace' : // 用户说说
	                $feedlist = Space::select('id')->where('is_audit',1)->where('user_id',$var['user_id']);
                    if (isset($var ['feed_type']) &&! empty($var ['feed_type'])) {
                        if ($var ['feed_type'] == 'post') {
                            $feedlist = $feedlist->where('is_repost',0);
                        } elseif ($var ['feed_type'] == 'repost') {
                            $feedlist = $feedlist->where('type','like','%repost');
                        } else {
	                        $feedlist = $feedlist->where('type',t($var ['feed_type']));
                        }
                    }
                     if (isset($var ['app']) &&! empty($var ['app'])) {

                        $feedlist = $feedlist->where('app',t($var ['app']));

                    }						
                    // 设定可查看的全站分享总数，可以提高大数据量下的查询效率
                    $max = null;//10000;
                    $list = $this->getList($feedlist, $this->limitnums, '', $page_paramter);
                
                break;
            case 'indexSpace' : // 用户说说
	                $feedlist = Space::select('id')->where('is_audit',1)->where('updated_at','>=',DB::raw('(select date_sub(now(), interval 24 HOUR))'));
                    if (isset($var ['feed_type']) &&! empty($var ['feed_type'])) {
                        if ($var ['feed_type'] == 'post') {
                            $feedlist = $feedlist->where('is_repost',0);
                        } elseif ($var ['feed_type'] == 'repost') {
                            $feedlist = $feedlist->where('type','like','%repost');
                        } else {
	                        $feedlist = $feedlist->where('type',t($var ['feed_type']));
                        }
                    }
                     if (isset($var ['app']) &&! empty($var ['app'])) {

                        $feedlist = $feedlist->where('app',t($var ['app']));

                    }						
                    // 设定可查看的全站分享总数，可以提高大数据量下的查询效率
                    $max = null;//10000;
                    $list = $this->getList($feedlist, $this->limitnums, '', $page_paramter);
                
                break;
            case 'newfollowing' : // 关注的人的最新分享
                $where = '( a.is_audit=1 OR ( a.is_audit=0 AND a.uid='.Auth::id().') ) AND a.is_del = 0 ';
                if ($var ['maxId'] > 0) {
                    $where .= " AND a.id > '".intval($var ['maxId'])."'";
                    $list = model('Feed')->getFollowingFeed($where);
                    $content ['count'] = $list ['count'];
                }
                break;
            case 'newall' : // 所有人最新分享 -- 正在发生的
                if ($var ['maxId'] > 0) {
                    $map ['id'] = array(
                            'gt',
                            intval($var ['maxId']),
                    );
                }
                $map ['is_del'] = 0;
                $map ['is_audit'] = 1;
                $map ['uid'] = array(
                        'neq',
                        $GLOBALS ['ts'] ['uid'],
                );
                $list = model('Feed')->getList($map);
                $content ['count'] = $list ['count'];

                break;
            case 'space' : // 用户个人空间
                if ($var ['feed_key'] !== '') {
                    // 关键字匹配 采用搜索引擎兼容函数搜索 后期可能会扩展为搜索引擎
                    $list = model('Feed')->searchFeed($var ['feed_key'], 'space', $var ['loadId'], $this->limitnums, '', $var ['feed_type']);
                } else {
	                $feedlist = Space::select('id')->where('is_audit',1);
	                if (isset($var ['loadId']) && $var ['loadId'] > 0) { // 非第一次
                    	$feedlist = $feedlist->where('id','<',intval($var ['loadId']));
					}	
                    $list = $this->getUserList($feedlist, $var ['user_id'], $var ['feedApp'], $var ['feed_type'], $this->limitnums, $page_paramter);
                }
                break;
            case 'one' :
                $where = ' (is_audit=1 OR is_audit=0 AND uid='.Auth::id().') AND is_del = 0 AND space_id = '.$var ['space_id'];
                // 设定可查看的全站分享总数，可以提高大数据量下的查询效率
                $max = null;//10000;
                $list = model('Feed')->getList($where, $this->limitnums, '', $max);
                break;
            
            case 'recommend' : // 推荐
             	$feedlist = Space::select('id')->where('is_audit',1);
                if (isset($var ['loadId']) && $var ['loadId'] > 0) { // 非第一次
                    $feedlist = $feedlist->where('id','<',intval($var ['loadId']));
                }
                if (isset($var ['feed_type']) &&! empty($var ['feed_type'])) {
                    if ($var ['feed_type'] == 'post') {
                        $feedlist = $feedlist->where('is_repost',0);
                    } elseif ($var ['feed_type'] == 'repost') {
                        $feedlist = $feedlist->where('type','like','%repost');
                    } else {
                        $feedlist = $feedlist->where('type',t($var ['feed_type']));
                    }
                }
                 if (isset($var ['app']) &&! empty($var ['app'])) {

                    $feedlist = $feedlist->where('app',t($var ['app']));

                }		
                $feedlist =  $feedlist->where('is_recommend',1);			
				$list = $this->getList($feedlist, $this->limitnums, '', $page_paramter);

               /* $content ['count'] = $list ['count'];*/
                break;           
        }
		// 分页的设置		
        isset($list ['pageHtml']) && $var ['pageHtml']  = $list ['pageHtml'];
        $var ['data'] = array();
        if (! empty($list ['data'])) {
            $content ['firstId'] = $var ['firstId'] = $list ['data'] [0] ['id'];
            $content ['lastId'] = $var ['lastId'] = $list ['data'] [(count($list ['data']) - 1)] ['id'];
            $var ['data'] = $list ['data'];

            // 赞功能
            $space_ids = getSubByKey($var ['data'], 'id');
			$var ['diggArr'] = app('spaceDiggRepository')->checkIsDigg($space_ids, Auth::id());
            $uids = array();
            foreach ($var ['data'] as &$v) {
               
                $v ['from'] = getFromClient($v ['from']);

                ! isset($uids [$v ['user_id']]) && $v ['user_id'] != Auth::id() && $uids [] = $v ['user_id'];
            }
            /*if (! empty($uids)) {
                $var ['followUids'] = Auth::user()->get();              
            } else {
                $var ['followUids'] = array();
            }*/
        }
  		
		$content ['pageHtml'] = $list ['pageHtml']  ;
        // 渲染模版
		$content ['html'] = view('widgets.'.$tpl)->with('var',$var)->__toString();
        return $content;
    }
    public function syncToSpace ($app, $uid, $appId)
    {
    	$type = '';
        $appTable = '';
        $data['content'] = '';
        switch ($app) {
            case 'albumPhoto':
                $type = 'photo_post';
                $appTable = 'albumPhotos';
                break;
            case 'vote':
                $type = 'vote_post';
                $appTable = 'votes';
                break;
            case 'blog':
                $type = 'blog_post';
                $appTable = 'blogs';
                break;
            case 'thread':
                $type = 'thread_post';
                $appTable = 'threads';
                break;
            case 'thread_reply':
            	$app = 'thread';
                $type = 'thread_reply_post';
                $appTable = 'threads';
                break;
            case 'activity':
                $type = 'activity_post';
                $appTable = 'activities';
                break;
        }
        
        $space = $this->put($uid, $app, $type, $data, $appId, $appTable);

        return $space['space_id'];
    }
    public function getUserList($feedlist, $user_id, $app, $type, $limit = 10, $page_paramter)
    {
        if (!$user_id) {
            $this->error = L('PUBLIC_WRONG_DATA');                // 获取信息失败
            return false;
        }
        !empty($app) && $map['app'] = $app;
        if (!empty($type)) {
            if ($type == 'repost') {
                $map['type'] = array('LIKE', '%repost');
            } else {
                $map['type'] = $type;
            }
        }
        $map['user_id'] = $user_id;
        $feedlist->where($map);
        $list = $this->getList($feedlist, $limit,'',$page_paramter);

        return $list;
    }
    public function getFollowingFeed ($feedlist , $limit = 10, $user_id = '', $fgid = '', $max = null,$page_paramter)
    {
        $user = empty($user_id) ?  Auth::user(): $user = User::findByUid($user_id);
        $following_ids = $user->following->lists('followable_id');
        if($following_ids){
	        $following_ids = $following_ids->toArray();
        }else{
	        $following_ids = [];
        }
        $feedlist = $feedlist->whereIn('user_id',$following_ids);
        $list = $this->getList($feedlist, $limit,'',$page_paramter);

        return $list;
    }
    public function getSpace($space_id)
    {
    	return app(Space::class)->find($space_id);
    }
}
