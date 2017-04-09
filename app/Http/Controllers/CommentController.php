<?php

namespace Hifone\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use Redirect;
use Hifone\Models\User;
use Hifone\Models\Comment;
use Hifone\Models\Space;
use Hifone\Models\AllReply;
use Hifone\Models\Thread;
use DB;
use Auth;
use Hifone\Events\Comment\CommentWasRemovedEvent;

class CommentController extends Controller
{
	private static $rand = 1;

	protected $commentRepository;

    public function __construct (Request $request)
    {
    	parent::__construct();	    
        $this->middleware('auth');
        $this->request = $request;
        $this->mid = Auth::id();
    }
    public function  render($data = null)
    {
    	$var = array();
        // Ĭ����������
        $var ['cancomment'] = 1; // �Ƿ��������
        $var ['canrepost'] = 1; // �Ƿ�����ת��
        $var ['cancomment_old'] = 1; // �Ƿ�������۸�ԭ����
        $var ['showlist'] = 1; // Ĭ����ʾԭ�����б�
        $var ['tpl'] = 'comment'; // ��ʾģ��
        $var ['app_name'] = 'space';
        $var ['table'] = 'spaces';
        $var ['limit'] = 10;
        $var ['order'] = 'DESC';
        $var ['initNums'] = Config('feed.weibo_nums');
        $_REQUEST ['p'] = intval($this->request->get('p')) ? intval($this->request->get('p')) : intval(Input::get('p'));
        if (empty($data)) {
            $data['app_user_id'] = intval(Input::get('app_uid'));
            $data['row_id'] = intval(Input::get('row_id'));
            $data['app_row_id'] = intval(Input::get('app_row_id'));
            $data['app_row_table'] = t(Input::get('app_row_table'));
            $data['isAjax'] = intval(Input::get('isAjax'));
            $data['showlist'] = intval(Input::get('showlist'));
            $data['cancomment'] = intval(Input::get('cancomment'));
            $data['cancomment_old'] = intval(Input::get('cancomment_old'));
            $data['app_name'] = t(Input::get('app_name'));
            $data['table'] = t(Input::get('table'));
            $data['canrepost'] = intval(Input::get('canrepost'));
        }
        // empty ( $data ) && $data = $_POST;
        is_array($data) && $var = array_merge($var, $data);
        $var['app_user_id'] = intval($var['app_user_id']);
        $var['row_id'] = intval($var['row_id']);
                // ��ȡ��Դ����
        $sourceInfo = app('spaceRepository')->get($var ['row_id']);
        $var ['feedtype'] = $sourceInfo ['type'];
       
        $var['comment_origin'] = 1;
        /*if ($var ['table'] == 'spaces' && $this->mid != $var ['app_user_id']) {
            // ��ȡԴ��Դ�����û���Ϣ
            $appRowData =app('spaceRepository')->get(intval($sourceInfo['app_row_id']));
            $var['user_info'] = $appRowData['user_info'];
        }*/

        if ($this->mid == $var ['app_user_id']) {
            $var['comment_origin'] = 1;
        }
        $return['data'] = $var['comment_origin'];
        if ($var ['showlist'] == 1) { // Ĭ��ֻȡ��ǰ10��
            $map = array();
            $map ['app'] = t($var ['app_name']);
            $map ['table'] = t($var ['table']);
            $map ['row_id'] = intval($var ['row_id']); // �������
            if (! empty($map ['row_id'])) {
                // ��ҳ��ʽ����
                $var ['list'] = app('commentRepository')->getCommentList($map, 'id '.t($var ['order']), intval($var ['limit']));
            }
        } 
        // ��Ⱦģ��
        
        $content = view('comments.'.$var ['tpl'],$var)->__toString();
        
        self::$rand ++;
        $ajax = $var ['isAjax'];
        unset($var, $data);
        // �������
        $return = array(
                'status' => 1,
                'data' => $content,
        );
        // var_dump($return);exit;

        return $ajax == 1 ? json_encode($return) : $return ['data'];
    }
     /**
     * ��ȡ�����б�
     *
     * @return array
     */
    public function getCommentList()
    {
        $map = array();
        $map ['app'] = t(Input::get('app_name'));
        $map ['table'] = t(Input::get('table'));
        $map ['row_id'] = intval(Input::get('row_id')); // �������
        if (! empty($map ['row_id'])) {
            // ��ҳ��ʽ����
            $var ['limit'] = 10;
            $var ['order'] = 'DESC';
            $var ['cancomment'] = Input::get('cancomment');
            $var ['showlist'] = Input::get('showlist');
            $var ['app_name'] = t(Input::get('app_name'));
            $var ['table'] = t(Input::get('table'));
            $var ['row_id'] = intval(Input::get('row_id'));
            $var ['list'] = app('commentRepository')->getCommentList($map, 'comment_id '.$var ['order'], $var ['limit']);
        }
        $content = view('comments.commentList',$var)->__toString();
        
        return $content;
    }
    /**
     * ������۵Ĳ���
     *
     * @return array �������״̬����ʾ��Ϣ
     */
    public function addcomment()
    {
        // ���ؽ����Ĭ��ֵ
        $return = array(
                'status' => 0,
                'data' => trans('public.PUBLIC_CONCENT_IS_ERROR'),
        );
        //����û��Ƿ񱻽���
        if($isDisabled = app('userDisableRepository')->isDisableUser($this->mid,'post'))
        {
            return json_encode(array(
                'status' => 0,
                'data' => '���Ѿ���������',
            ));
        }
        // ��ȡ��������
        $data ['app'] = t(Input::get('app_name'));
        $data ['table'] = t(Input::get('table_name'));
        $data ['content'] = Input::get('content');
        $data ['app_user_id'] = intval(Input::get('app_uid'));
        $data ['app_row_id'] = intval(Input::get('app_row_id'));
        $data ['app_row_table'] = t(Input::get('app_row_table'));
        $data ['row_id'] = intval(Input::get('row_id'));
        $data ['to_comment_id'] = intval(Input::get('to_comment_id'));
        $data ['to_user_id'] = intval(Input::get('to_uid'));
        $data ['ifShareFeed'] = intval(Input::get('ifShareFeed'));
        $data ['comment_old'] = intval(Input::get('comment_old'));
        $data ['app_detail_summary'] = t(Input::get('app_detail_summary'));
		$data ['created_at'] = date("Y-m-d H:i:s");

        $source = app('sourceRepository')->getSourceInfo($data ['table'], $data ['row_id'], $data ['app']);
        $uid = $source['user_id'];
        $filterContentStatus = filter_words($data['content']);
        if (!$filterContentStatus['status']) {
            exit(json_encode(array('status' => 0, 'data' => $filterContentStatus['data'])));
        }
        $data['content'] = $filterContentStatus['data'];

        // �ж���Դ�Ƿ�ɾ��
        $dao = tableModel($data ['table']);
        
        $sourceInfo = $dao::where('id',$data ['row_id'])->first();

        if (! $sourceInfo) {
            $return ['status'] = 0;
            $return ['data'] = '�����ѱ�ɾ��������ʧ��';
            exit(json_encode($return));
        }

        //���ݾɷ���
        if (empty($data['app_detail_summary'])) {
            $source =app('sourceRepository')->getSourceInfo($data ['table'], $data ['row_id'], $data ['app']);
            $data['app_detail_summary'] = $source['source_body'];
            $data['app_detail_url'] = $source['source_url'];
            $data['app_user_id'] = $source['source_user_info']['id'];
        } else {
            $data['app_detail_summary'] = $data ['app_detail_summary'].'<a class="ico-details" href="'.$data['app_detail_url'].'"></a>';
        }
        // $data['from'] = 'feed';
        // ������۲���
        $data ['comment_id'] = app('commentRepository')->addComment($data);
       // $return['sql'] = D()->getLastSql();
        if ($data ['comment_id']) {
            $talkbox = intval(Input::get('talkbox'));
            $return ['status'] = 1;
            $return ['data'] = $this->parseComment($data, $talkbox);
            // ȥ���ظ��û�@
            $lessUids = array();
            if (! empty($data ['to_user_id'])) {
                $lessUids [] = $data ['to_user_id'];
            }

            /*if (Input::get('ifShareFeed') == 1) {  // ת�����ҵķ���
                //�������ݷ���
                unlockSubmit();
                $this->_updateToweibo($data, $sourceInfo, $lessUids);
            } elseif ($data ['comment_old'] != 0) {  // �Ƿ����۸�ԭ������
                unlockSubmit();
                $this->_updateToComment($data, $sourceInfo, $lessUids);
            }*/
        }
        !$data['comment_id'] && $return['data'] = app('commentRepository')->getError();
        exit(json_encode($return));
    }
     /**
     * ��Ⱦ����ҳ�� ��addcomment�����е���
     */
    public function parseComment($data, $talkbox)
    {
        $data ['userInfo'] = app('userRepository')->getUserInfo(Auth::id());
        // ��ȡ�û�����Ϣ
        //$data ['userInfo'] ['groupData'] = model('UserGroupLink')->getUserGroupData(Auth::id());
        $data ['content'] = preg_html($data ['content']);
        $data ['content'] = parse_html($data ['content']);
        $data['content'] = str_replace('__THEME__', config('common.theme_public_url'), parse_html($data['content']));
        //$data ['iscommentdel'] = CheckPermission('core_normal', 'comment_del');
        if ($talkbox) {
            $html = '<dl model-node="comment_list" class="msg-dialog">';
            $html .= '<dt class="right">';
            $html .= '<a href="'.route('public/Profile/index', array('uid' => $data['userInfo']['uid'])).'"><img src="'.$data['userInfo']['avatar_url'].'"></a>';
            $html .= '</dt>';
            $html .= '<dd class="dialog-r">';
            $html .= '<i class="arrow-mes-r"></i>';
            $html .= '<p class="info">'.$data['userInfo']['space_link'].':&nbsp;'.$data['content'].'</p>';
            $html .= '<p class="date"><span class="right">';
            $html .= '<a href="javascript:;" event-node="comment_del" event-args="comment_id='.$data['comment_id'].'">ɾ��</a>'."\n";
            $html .= '<i class="vline">|</i>'."\n";
            $html .= '<a href="javascript:;" event-args="row_id='.$data['row_id'].'&app_uid='.$data['app_uid'].'&to_comment_id='.$data['to_comment_id'].'&to_uid='.$data['to_uid'].'&to_comment_uname='.$data['userInfo']['uname'].'&app_name='.$data['app'].'&table='.$data['table'].'" event-node="reply_comment" >�ظ�</a>';
            $html .= '</span>�ո�</p>';
            $html .= '</dd>';
            $html .= '</dl>';

            return $html;
        } else {
            return view('comments.parseComment',$data)->__toString();
        }
    }
    public function remove ()
    {
    	$comment_id = intval($_POST ['comment_id']);
        $comment = app('commentRepository')->getCommentInfo($comment_id);
        // ������ʱ
        if (! $comment) {
            return 0;
        }
        // ������ʱ
        if ($comment ['user_id'] != Auth::id()) {
            if (! Auth::user()->can("manage_comment")) {
                $return['msg'] = 'û��Ȩ��';
                exit(json_encode($return));
            }  
        } 

        if (! empty($comment_id)) {
	        $comment = Comment::where('id',$comment_id)->first();
	        if($comment && $comment->delete()){
		        AllReply::where('comment_id',$comment_id)->delete();
		        if($comment->app == 'space'){
			        Space::where('id',$comment->row_id)->decrement('comment_count');
			        Space::where('id',$comment->row_id)->decrement('comment_all_count');
		        }
	        }
	        if ($comment ['user_id'] != Auth::id()) {
	        	event(new CommentWasRemovedEvent($comment));
        	}
            return 1;
        }

        return 0;
    }
}
