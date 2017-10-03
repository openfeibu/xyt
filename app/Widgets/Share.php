<?php

namespace Hifone\Widgets;

use Auth;
use Arrilot\Widgets\AbstractWidget;
use Hifone\Models\Space;
use Hifone\Models\SpaceDigg;
use Hifone\Models\AlbumPhoto;
use Hifone\Models\Vote;
use Hifone\Models\Blog;
use Hifone\Models\Thread;
use Hifone\Models\SendGift;
use Illuminate\Support\Facades\View;

class Share extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];


	public function __construct (array $config)
	{
		parent::__construct($config);
	}
	public function run()
    {
	    $var = array();
        $var['appname'] = 'public';
        $var['cancomment'] = 1;
        $var['feed_type'] = 'repost';

		$config = $this->config;
        is_array($config) && $var = array_merge($var, $config);

        // 获取资源是否被删除
        switch ($config['appname']) {
            case 'vote':
                $vInfo = Vote::where('id',$var['sid'])->first()->toArray();
                $sInfo = app('spaceRepository')->getFeedInfo($vInfo['space_id']);
                break;
            case 'thread':
                $vInfo = Thread::where('id',$var['sid'])->first()->toArray();
                $sInfo = app('spaceRepository')->getFeedInfo($vInfo['space_id']);
                break;
            case 'albumPhoto':
                $vInfo = AlbumPhoto::where('id',$var['sid'])->first()->toArray();
                $sInfo = app('spaceRepository')->getFeedInfo($vInfo['space_id']);
                break;
            case 'blog':
                $vInfo = Blog::where('id',$var['sid'])->first()->toArray();
                $sInfo = app('spaceRepository')->getFeedInfo($vInfo['space_id']);
                break;
            case 'gift':
                $vInfo = SendGift::where('id',$var['sid'])->first()->toArray();
                $sInfo = app('spaceRepository')->getFeedInfo($vInfo['space_id']);
                break;
            default:
                $sInfo = app('spaceRepository')->getFeedInfo($var['sid']);
        }

        extract($var, EXTR_OVERWRITE);

        if ($config['nums'] > 0) {
            $showNums = "&nbsp;({$config['nums']})";
        } else {
            $showNums = '';
        }


        return "<a event-node=\"share\" class=\"repost\" href=\"javascript:void(0);\" event-args='sid={$sid}&stable={$stable}&curtable={$current_table}&curid={$current_id}&initHTML={$initHTML}&appname={$appname}&cancomment={$cancomment}&feedtype={$feed_type}&is_repost={$is_repost}'>".L('PUBLIC_SHARE_STREAM').$showNums."</a>";

	}

}
