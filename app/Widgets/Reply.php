<?php

namespace Hifone\Widgets;

use Arrilot\Widgets\AbstractWidget;
use Hifone\Models\AllReply;

class Reply extends AbstractWidget
{
	/**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $var = array();
        //默认配置数据
        $var['cancomment'] = 1;  //是否可以评论
        $var['showlist'] = 1;         // 默认显示原评论列表
        $var['tpl'] = 'detail'; // 显示模板
       /* $var['app_name'] = $this->config['app_name'];
        $var['table'] = $this->config['table'];*/
        $var['limit'] = 10;
        $var['initNums'] = config('system_config.feed.weibo_nums');
       	
        empty($data) && $data = $this->config;
        
        is_array($data) && $var = array_merge($var, $data);

        if ($var['showlist'] == 1) { 
            $map = array();
            $map['post_id'] = intval($var['post_id']);   
            $map['post_from'] = $var['post_from'];
            if (!empty($map['post_id'])) {
                $var['list'] = app('allReplyRepository')->getReplyList($map, $var['limit']);
            }
        }
        
		return view('widgets.reply',$var)->render();

    }
}