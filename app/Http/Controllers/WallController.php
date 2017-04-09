<?php
namespace Hifone\Http\Controllers;

use DB;
use Auth;
use Input;
use Redirect;
use Validator;
use Carbon\Carbon;
use Hifone\Models\User;
use Hifone\Models\Wall;
use Illuminate\Http\Request;
use AltThree\Validator\ValidationException;

class WallController extends Controller
{
	public function __construct()
    {
	    parent::__construct();
        $this->middleware('auth');
        $this->mid = Auth::id();
    }
    public function wall ()
    {
    	 $var = array();
        //默认配置数据
        $var['cancomment'] = 1;  //是否可以评论

        $var['limit'] = 5;
        $var['initNums'] = config('system_config.feed.weibo_nums');
       	
        empty($data) && $data = Input::get();
        
        is_array($data) && $var = array_merge($var, $data);
        
        $map = array();
        $map['post_id'] = intval($var['post_id']);   
        if (!empty($map['post_id'])) {
            $var['list'] = app('wallRepository')->getWallList($map, $var['limit']);
        }
        if(!$var['list']){
			return [
				'html' => '没有更多留言了',
				'pageHtml' => '',
			];
		}
        $html = view("wall.list",$var)->__toString();
		$pageHtml = view("wall.page")->with('page',$var['list'])->__toString(); 
		return [
			'html' => $html,
			'pageHtml' => $pageHtml,
		];
    }
    
    public function addWall ()
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


		$data['addtoend'] = intval($_POST['addtoend']);
        $data['post_id'] = intval($_POST['post_id']);
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

        if ($new_wall = Wall::create($data)) {	
        	lockSubmit();
            $data['reply_id'] = $new_wall->id;
            $return['status'] = 1 ;
            $return['data'] = $this->parseWall($data);
            unlockSubmit();
        }
        echo json_encode($return);
    }
    /**
     * 渲染留言
     */
    public function parseWall($data)
    {
        $data['user_info'] = app('userRepository')->getUserInfo(Auth::id());
        $data['content'] = preg_html($data['content']);
        $data['content'] = parse_html($data['content']);

        return view('wall.parse_wall',$data)->render();
    }
    /**
     * 回复
     */
    public function reply_reply(Request $request)
    {
        $var = $request->all();
        $var['initNums'] =  config('system_config.feed.weibo_nums');
        $var['commentInfo'] = app('wallRepository')->getWallInfo($var['id'], false);
        $var['canrepost'] = 1;
        $var['cancomment'] = 1;

      	$var['initHtml'] = L('PUBLIC_STREAM_REPLY').'@'.$var['commentInfo']['user_info']['username'].' ：';   // 回复

      	return view('widgets.reply_reply',$var)->render();
    }
}