<?php

namespace Hifone\Http\Controllers;

use Auth;
use Validator;
use Hifone\Models\Space;
use Hifone\Commands\Space\AddSpaceCommand;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\View;
use Hifone\Services\FilesHandle\VideoService;
use Hifone\Events\Vote\VoteWasRemovedEvent;
use Hifone\Events\Thread\ThreadWasRemovedEvent;
use Hifone\Events\Album\AlbumPhotoWasRemovedEvent;
use Hifone\Events\Space\SpaceWasRemovedEvent;
use Hifone\Events\Space\SpaceWasAddedEvent;
use Illuminate\Http\Request;
use Input;
use Redirect;
use Hifone\Models\User;
use Hifone\Models\Vote;
use Hifone\Models\AlbumPhoto;
use Hifone\Models\Thread;
use DB;

class SpaceController extends Controller
{
	protected $videoService;

	public function __construct(VideoService $videoService)
    {
	    parent::__construct();
		$this->title = '空间';
        $this->middleware('auth');
        $this->videoService = $videoService;
    }
    public function index (Request $request)
    {
	    // 安全过滤
        $d ['type'] = isset($request->type) ? t($request->type) : 'all';
        $d ['feed_type'] = isset($request->feed_type) ? t($request->feed_type) : '';
        $d ['app'] = isset($request->app) ? t($request->app) : '';
        $d ['feed_key'] = isset($request->feed_key) ? t($request->feed_key) : '';
        $d ['showPage'] = 0;
        // 关注的人
        /*if ($d ['type'] === 'following') {
            $d ['groupname'] = trans('public.PUBLIC_ACTIVITY_STREAM'); // 我关注的
            $d ['followGroup'] = model('FollowGroup')->getGroupList($this->mid);
            foreach ($d ['followGroup'] as $v) {
                if ($v ['follow_group_id'] == t($_REQUEST ['fgid'])) {
                    $d ['groupname'] = $v ['title'];
                    break;
                }
            }
        }*/
        $new_votes = app('voteRepository')->newVote();
        $hot_votes = app('voteRepository')->hotVote();
        $hot_threads = app('threadRepository')->hotThreads();
        $ex_blogs = app('blogRepository')->exBlogs();
    	return $this->view('space.index',$d)
    				->with('d',$d)
    				->with('user',Auth::user())
    				->with('hot_votes',$hot_votes)
    				->with('new_votes',$new_votes)
    				->with('hot_threads',$hot_threads)
    				->with('ex_blogs',$ex_blogs);
    }
    public function store ()
    {
        $return = array(
                'status' => 1,
                'data' => '',
        );
        // 用户发送内容

        $d ['content'] = Input::get('content') ? h(Input::get('content')) : '';
        $filterContentStatus = filter_words($d ['content']);
        if (! $filterContentStatus ['status']) {
            exit(json_encode(array(
                    'status' => 0,
                    'data' => $filterContentStatus ['data'],
            )));
        }
        $d ['content'] = $filterContentStatus ['data'];


        // 原始数据内容
        $filterBodyStatus = filter_words(Input::get('body'));

        if (! $filterBodyStatus ['status']) {
            $return = array(
                    'status' => 0,
                    'data' => $filterBodyStatus ['data'],
            );
            exit(json_encode($return));
        }
        $d ['body'] = $filterBodyStatus ['data'];

        // 安全过滤
        foreach (Input::all() as $key => $val) {
            Input::merge(array($key => t(Input::get($key))));
        }
        $d ['source_url'] = urldecode(Input::get('source_url')); // 应用分享到分享，原资源链接
                                                                 // 滤掉话题两端的空白
        $d ['body'] = preg_replace("/#[\s]*([^#^\s][^#]*[^#^\s])[\s]*#/is", '#'.trim('${1}').'#', $d ['body']);

		// 发送说说的类型
        $type = t(Input::get('type'));

		$d ['attach_id'] = trim(t(Input::get('attach_id')), '|');
        if (! empty($d ['attach_id'])) {
            $d ['attach_id'] = explode('|', $d ['attach_id']);
            if (count($d ['attach_id']) == 1 && Input::get('channel_id') != '' && false) {
                $d ['attach_id'][1] = $d ['attach_id'][0];
                $d ['attach_id'][0] = $numbers[0];
                $type = 'postimage';
            }
            array_map('intval', $d ['attach_id']);
        }

        if (Input::get('video_id')) {
            $d ['video_id'] = intval(Input::get('video_id'));
        }


        if (! $data = app('spaceRepository')->put(Auth::id(), 'space', $type, $d)) {
            $return = array(
                    'status' => 0,
                    'data' => app('spaceRepository')->getError(),
            );
            exit(json_encode($return));
        }

        $data ['from'] = getFromClient($data ['from'], $data ['app']);

        $return ['data'] = view('space.newFeed',$data)->__toString();
        // 分享ID
        $return ['feedId'] = $data ['space_id'];
        $return ['is_audit'] = $data ['is_audit'];
        // 更新用户最后发表的说说
        //$last ['last_space_id'] = $data ['space_id'];
        //$last ['last_post_time'] = $_SERVER ['REQUEST_TIME'];
        //model('User')->where('uid='.$this->uid)->save($last);
		event(new SpaceWasAddedEvent());
        exit(json_encode($return));
    }
    /**
     *
     * 上传视频接受处理
     *
     */

    public function videoParamUrl (Request $request)
    {
    	$link = Input::get('url');

        if (preg_match('/(youku.com|youtube.com|qq.com|ku6.com|sohu.com|sina.com.cn|tudou.com|yinyuetai.com)/i', $link, $hosts)) {
            $return['boolen'] = 1;
            $return['data'] = $link;
        } else {
            $return['boolen'] = 0;
            $return['message'] = '仅支持优酷网、土豆网、音悦台视频发布';
        }

        $flashinfo = $this->videoService->_video_getflashinfo($link, strtolower($hosts[1]));

        $return['title'] = 1;
        if (!$flashinfo['title'] || json_encode($flashinfo['title']) == 'null') {
            $return['title'] = 0;
            $return['message'] = '仅支持优酷网、土豆网、音悦台视频发布';
        }
        $return['data'] = $flashinfo['title'].' '.$return['data'];
        exit(json_encode($return));
    }
    public function video_exist ()
    {
        $host = t(Input::get('host'));
        if ($host) {
            $data ['status'] = 1;
        } else {
            $data ['status'] = 0;
            $data ['msg'] = '该视频正在转码中';
        }
        exit(json_encode($data));
    }
    public function getSmile ()
    {
    	return json_encode(app('expressionRepository')->getAllExpression());
    }
	public function getEmoji ()
    {
    	return json_encode(app('expressionRepository')->getAllEmoji());
    }
    public function loadMore (Request $request)
    {

        $page_paramter =  $var = [
        	'p' =>  isset($request->p) ? intval($request->p) : 0,
        	'loadId' =>  isset($request->loadId) ? intval($request->loadId) : 0,
        	'load_count' =>  isset($request->load_count) ? intval($request->load_count) : 0,
        	'type' =>  isset($request->type) ? $request->type : 'all',
        	'feed_type' =>  isset($request->feed_type) ? $request->feed_type : '',
        	'feed_key' =>  isset($request->feed_key) ? $request->feed_key : '',
        	'fgid' =>  isset($request->fgid) ? intval($request->fgid) : 0,
        	'topic_id' =>  isset($request->topic_id) ? intval($request->topic_id) : 0,
        	'gid' =>  isset($request->gid) ? intval($request->gid) : 0,
        	'app' =>  isset($request->app) ? $request->app : '',
			'to_user_id' =>  isset($request->to_user_id) ? $request->to_user_id : 0,
        ];
        $var['page_paramter'] = $page_paramter;
       	if (! empty($var ['p']) || intval($var ['load_count']) == 4) {
            unset($var ['loadId']);
            $var['limitnums'] = 40;
        } else {
            $return = array(
                    'status' => - 1,
                    'msg' => L('PUBLIC_LOADING_ID_ISNULL'),
            );
            $var['limitnums'] = 10;
        }
        $return = array(
                'status' => - 1,
                'msg' => L('PUBLIC_LOADING_ID_ISNULL'),
        );

        // 查询是否有话题ID
        if ($var ['topic_id']) {
            $content = app('spaceRepository')->getTopicData($var, '_FeedList');
        } else {
            $content = app('spaceRepository')->getData($var, '_FeedList');
        }

        // 查看是否有更多数据
        if (empty($content ['html']) || (empty($var ['loadId']) && intval($var ['load_count']) != 4)) {
            // 没有更多的
            $return = array(
                    'status' => 0,
                    'msg' => L('PUBLIC_WEIBOISNOTNEW'),
            );
        } else {
            $return = array(
                    'status' => 1,
                    'msg' => L('PUBLIC_SUCCESS_LOAD'),
            );
            $return ['html'] = $content ['html'];
            $return ['loadId'] = $content ['lastId'];
            $return ['firstId'] = (empty($var ['p']) && empty($var ['loadId'])) ? $content ['firstId'] : 0;
            $return ['pageHtml'] = $content ['pageHtml'];
        }
        exit(json_encode($return));
    }
    /**
     * 分享/转发分享操作，需要传入POST的值
     *
     * @return json 分享/转发分享后的结果信息JSON数据
     */
    public function shareSpace()
    {
        // 获取传入的值
        $post = $_POST;
        // 安全过滤
        foreach ($post as $key => $val) {
            $post [$key] = t($post [$key]);
        }
        $filterBodyStatus = filter_words($post ['body']);
        if (! $filterBodyStatus ['status']) {
            $return = array(
                    'status' => 0,
                    'data' => $filterBodyStatus ['data'],
            );
            exit(json_encode($return));
        }
        $post ['body'] = $filterBodyStatus ['data'];

        // 判断资源是否删除
        if (empty($post ['curid'])) {
            $map ['id'] = intval($post ['sid']);
        } else {
            $map ['id'] = intval($post ['curid']);
        }
        $isExist = Space::where($map)->count();
        if ($isExist == 0) {
            $return ['status'] = 0;
            $return ['data'] = '内容已被删除，转发失败';
            exit(json_encode($return));
        }
        // 进行分享操作
        $return = app('shareRepository')->shareFeed($post, 'share');
        if ($return ['status'] == 1) {
            $app_name = $post ['app_name'];

            // 添加积分
            if ($app_name == 'public') {
                model('Credit')->setUserCredit($this->uid, 'forward_weibo');
                // 分享被转发
                $suid = model('Feed')->where($map)->getField('uid');
                model('Credit')->setUserCredit($suid, 'forwarded_weibo');
            }
            if ($app_name == 'weiba') {
                model('Credit')->setUserCredit($this->uid, 'forward_topic');
                // 分享被转发
                $suid = D('Feed')->where('feed_id='.$map ['feed_id'])->getField('uid');
                model('Credit')->setUserCredit($suid, 'forwarded_topic');
            }
            // 分享配置
            $return['space_id'] = $return['data']['id'];
            $return ['data'] = view('space.newFeed',$return['data'])->__toString();
        }
        exit(json_encode($return));
    }
    public function remove ()
    {
	    $return = array(
                'status' => 0,
                'data' => L('PUBLIC_DELETE_FAIL'),
                'msg' => '',
        );
    	$space_id = Input::get('space_id');

    	$space = Space::where('id',$space_id)->first();

    	// 不存在时
        if (! $space) {
            $return['msg'] = '不存在';
            exit(json_encode($return));
        }
         // 非作者时
        if ($space->user_id != Auth::id()) {
            // 没有管理权限不可以删除
            if (! Auth::user()->can("manage_spaces")) {
                $return['msg'] = '没有权限';
                exit(json_encode($return));
            }

        }
        $remove = $space->delete();

		if(in_array($space->type,['post','postvideo','repost','postimage','postmusic']))
		{
			if ($space->user_id != Auth::id()) {
            	event(new SpaceWasRemovedEvent($photo));
        	}
		}
        // 执行应用信息相关删除
        switch ($space->type) {
            case 'photo_post' :
                $photos = AlbumPhoto::where('space_id',$space->id)->get();
                if ($photos) {
	                foreach( $photos as $key => $photo )
	                {
	                	$photo->delete();
	                	if ($space->user_id != Auth::id()) {
	                    	event(new AlbumPhotoWasRemovedEvent($photo));
	                	}
	                }

                }
                break;
            case 'vote_post' :
                $vote = Vote::where('space_id',$space->id)->first();
                if ($vote && $vote->delete()) {
	                if ($space->user_id != Auth::id()) {
                    	event(new VoteWasRemovedEvent($vote));
                	}
                }
                break;
           	case 'thread_post' :
                $thread = Thread::where('space_id',$space->id)->first();
                if ($thread && $thread->delete()) {
	                if ($space->user_id != Auth::id()) {
                    	event(new ThreadWasRemovedEvent($thread));
                	}
                }
                break;
        }
        $return['status'] = 1;
        $return ['data'] = $remove ? L('PUBLIC_DELETE_SUCCESS') : L('PUBLIC_DELETE_FAIL');

        return json_encode($return);
    }
    public function recommend()
    {
	    if (! Auth::user()->can("manage_spaces")) {
		    return -1;
	    }
        $space_id = intval($_POST ['space_id']);

		$space =  Space::where('id',$space_id)->first();

        $is_recommend = $space->is_recommend == 1 ? 0 : 1;

        Space::where('id',$space_id)->update(['is_recommend' =>$is_recommend ]);

        return  $is_recommend;
    }
    public function multimageBox ()
    {
	    $var ['fileTypeExts'] = '';
        $data ['unid'] = substr(strtoupper(md5(uniqid(mt_rand(), true))), 0, 8);
        $data ['status'] = 1;
        $data ['total'] = 5;
        $var ['unid'] = $data ['unid'];
        $ext = array(
                'jpg',
                'gif',
                'jpeg',
                'png',
        );
        foreach ($ext as $value) {
            $var ['fileTypeExts'] .= '*.'.strtolower($value).'; ';
        }
        $var ['fileSizeLimit'] = floor(1 * 1024).'KB';
        $var ['total'] = $data ['total'];
        $data ['html'] = $this->view('space.multimageBox',$var)->__toString();
        exit(json_encode($data));
    }
}
