<?php
namespace Hifone\Http\Controllers;

use DB;
use Auth;
use Input;
use Redirect;
use Validator;
use Carbon\Carbon;
use Hifone\Models\User;
use Hifone\Models\Space;
use Hifone\Models\Comment;
use Hifone\Models\AllReply;
use Illuminate\Http\Request;
use AltThree\Validator\ValidationException;
use Hifone\Events\Comment\CommentWasAddedEvent;
use Hifone\Events\Comment\CommentWasRemovedEvent;

class AllReplyController extends Controller
{
	public function __construct()
    {
	    parent::__construct();
        $this->middleware('auth');
        $this->mid = Auth::id();
    }
    public function addReply ()
    {
    	//检测用户是否被禁言
        if($isDisabled = app('userDisableRepository')->isDisableUser($this->mid,'post'))
        {
            exit(json_encode(array(
                'status' => 0,
                'data' => '您已经被禁言了',
            )));
        }

        $return = array('status' => 0, 'data' => L('PUBLIC_CONCENT_IS_ERROR'));

		$data['space_id'] = intval($_POST['space_id']);
		$data['addtoend'] = intval($_POST['addtoend']);
        $data['post_id'] = intval($_POST['post_id']);
        $data['post_user_id'] = intval($_POST['post_user_id']);
        $data['post_from'] = $_POST['post_from'];
        $data['to_reply_id'] = intval($_POST['to_reply_id']);
        $data['to_user_id'] = intval($_POST['to_user_id']);
        $data['user_id'] = $this->mid;
        $data['content'] = preg_html(h($_POST['content']));
        $data['created_at'] = date('Y-m-d H:i:s');

        $filterContentStatus = filter_words($data['content']);
        if (!$filterContentStatus['status']) {
            exit(json_encode(array('status' => 0, 'data' => $filterContentStatus['data'])));
        }
        $data['content'] = $filterContentStatus['data'];

        if (isSubmitLocked()) {
            $return['status'] = 0;
            $return['data'] = '发布内容过于频繁，请稍后再试！';
            exit(json_encode($return));
        }

        if ($new_reply = AllReply::create($data)) {
            // 锁定发布
            lockSubmit();

            /*$space = Space::where('id',intval($_POST['space_id']))->first();

            $datas['app'] = $_POST['post_from'];
            $datas['table'] = 'spaces';
            $datas['content'] = preg_html($data['content']);
            $datas['app_user_id'] = intval($_POST['post_user_id']);
            $datas['row_id'] = intval($_POST['space_id']);
            $datas['to_comment_id'] = $data['to_reply_id'] ?  AllReply::where('id',$data['to_reply_id'])->pluck('comment_id') : 0;
            $datas['to_user_id'] = intval($_POST['to_user_id']);
            $datas['user_id'] = Auth::id();
            $datas['created_at'] = date('Y-m-d H:i:s');
            $datas['client_type'] = getVisitorClient();
            if($space){
	            // 解锁
            	unlockSubmit();

				$datas['addComment'] = false;

				$comment = app('commentRepository')->addComment($datas);

				$new_reply->update(['comment_id' => $comment->id]);

	            $data['comment_id'] = $comment->id;

	            lockSubmit();
			}else{*/
				event(new CommentWasAddedEvent());
	        	// 发邮件
	         	if ($data['to_user_id'] != Auth::id() || $_POST['post_user_id'] != Auth::id() && $data['app_user_id'] != '') {

	             	if (!empty($data['to_user_id']) && $to_user = User::findByUid($data['to_user_id'])) {
	                 	// 回复
		                app('notifier')->batchNotify(
		                    $data['post_from'].'_comment_comment',
		                    Auth::user(),
		                    [$to_user],
		                    $new_reply,
		                    $new_reply->content
		                );
	             	} else {
	                 	// 评论
		                if (!empty($_POST['post_user_id']) && $to_user = User::findByUid($_POST['post_user_id'])) {
		                    app('notifier')->batchNotify(
			                    $data['post_from'].'_new_comment',
			                    Auth::user(),
			                    [$to_user],
			                    $new_reply,
			                    $new_reply->content
			                );
		                }
	            	}
	         	}
			/*}*/
			unlockSubmit();

            $data['reply_id'] = $new_reply->id;
            $return['status'] = 1 ;
            $return['data'] = $this->parseReply($data);
        }
        echo json_encode($return);
    }
    /**
     * 渲染评论页面 在addcomment方法中调用
     */
    public function parseReply($data)
    {
        $data['user_info'] = app('userRepository')->getUserInfo(Auth::id());
       // $data['userInfo']['groupData'] = model('UserGroupLink')->getUserGroupData($GLOBALS['ts']['uid']);   //获取用户组信息
        $data['content'] = preg_html($data['content']);
        $data['content'] = parse_html($data['content']);

        return view('widgets.parse_reply',$data)->render();
    }
    /**
     * 评论帖子回复
     */
    public function reply_reply(Request $request)
    {
        $var = $request->all();
        $var['initNums'] =  config('system_config.feed.weibo_nums');
        $var['commentInfo'] = app('allReplyRepository')->getReplyInfo($var['id'], false);
        $var['canrepost'] = 1;
        $var['cancomment'] = 1;

      	// 获取原作者信息
      	/*$rowData = app('spaceRepository')->get(intval($var['commentInfo']['row_id']));
        $appRowData =app('spaceRepository')->get($rowData['app_row_id']);
        $var['user_info'] = $appRowData['user_info'];
      	// 分享类型
      	$var['feedtype'] = $rowData['type'];*/

      	$var['initHtml'] = L('PUBLIC_STREAM_REPLY').'@'.$var['commentInfo']['user_info']['username'].' ：';   // 回复

      	return view('widgets.reply_reply',$var)->render();
    }
    public function remove ()
    {
	    $reply_id = intval($_POST ['reply_id']);
        $reply = AllReply::where('id',$reply_id)->first();
        // 不存在时
        if (! $reply) {
            return 0;
        }
        // 非作者时
        if ($reply->user_id != Auth::id()) {
            if (! Auth::user()->can("manage_comment")) {
                return 0;
            }
        }

        if($reply_id){
			$reply->delete();
	        $comment = Comment::where('id',$reply->comment_id)->first();
	        if($comment && $comment->app == 'space'){
		        Space::where('id',$comment->row_id)->decrement('comment_count');
		        Space::where('id',$comment->row_id)->decrement('comment_all_count');
	        }
	        Space::where('id',$comment->delete());
	        if ($reply->user_id != Auth::id()) {
	        	event(new CommentWasRemovedEvent($comment));
        	}
	        return 1;
        }
        return 0;
    }
}
