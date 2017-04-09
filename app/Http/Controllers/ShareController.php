<?php

namespace Hifone\Http\Controllers;

use Auth;
use Validator;
use Hifone\Models\Space;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use Input;
use Redirect;
use Hifone\Models\User;
use DB;

class ShareController extends Controller
{
	public function __construct()
    {
	    parent::__construct();	    
        $this->middleware('auth');
    }
    public function index (Request $request)
    {
    	$shareInfo['sid'] = intval($request->sid);
        $shareInfo['stable'] = t($request->stable);
        $shareInfo['initHTML'] = h($request->initHTML);
        $shareInfo['curid'] = t($request->curid);
        $shareInfo['curtable'] = t($request->curtable);
        $shareInfo['appname'] = t($request->appname);
        $shareInfo['cancomment'] = intval($request->cancomment);
        $shareInfo['is_repost'] = intval($request->is_repost);
        if (empty($shareInfo['stable']) || empty($shareInfo['sid'])) {
            echo L('PUBLIC_TYPE_NOEMPTY');
            exit();
        }
        if (!$oldInfo = app('sourceRepository')->getSourceInfo($shareInfo['stable'], $shareInfo['sid'], $shareInfo['appname'])) {
            echo L('PUBLIC_INFO_SHARE_FORBIDDEN');
            exit();
        }
        empty($shareInfo['appname']) && $shareInfo['appname'] = $oldInfo['app'];
        if (empty($shareInfo['initHTML']) && !empty($shareInfo['curid'])) {
            if ($shareInfo['curid'] != $shareInfo['sid'] && $shareInfo['is_repost'] == 1) {
                $app = $shareInfo['appname'] ;
                $curInfo = app('sourceRepository')->getSourceInfo($shareInfo['curtable'], $shareInfo['curid'], $app);
                $userInfo = $curInfo['source_user_info'];
                $shareInfo['initHTML'] = '';
            }
        }
        $shareInfo['cancomment'] = 1;
        $weiboSet = config('system_config.feed');
        $canShareFeed = in_array('repost', $weiboSet['weibo_premission']) ? 1  : '0';
        $initNums = $weiboSet['weibo_nums'];
        $shareInfo['shareHtml'] = !empty($oldInfo['shareHtml'])  ?  $oldInfo['shareHtml'] : '';
        
        return $this->view('share.index',compact('canShareFeed','initNums','shareInfo','oldInfo'));
    }
    
}