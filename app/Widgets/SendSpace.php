<?php

namespace Hifone\Widgets;

use Auth;
use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Facades\View;

class SendSpace extends AbstractWidget
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
    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
	    $var = array();
        $var['initHtml'] = '';
        $var['post_event'] = 'post_feed';
        $var['cancomment'] = 0;
        $config = $this->config;
        is_array($config) && $var = array_merge($var, $config);
        !isset($var['send_type']) && $var['send_type'] = 'send_space';
        $weiboSet = config('system_config.feed');
        $var['initNums'] = $weiboSet['weibo_nums'];
        $var['weibo_premission'] = $weiboSet['weibo_premission'];
        !isset($var['type']) && $var['type'] = 'post';
        !isset($var['app_name']) && $var['app_name'] = 'public';
        !isset($var['prompt']) && $var['prompt'] = '转发成功';
        $var['time'] = $_SERVER['REQUEST_TIME'];
        // 渲染模版
        $tpl = isset($config['tpl']) ? $config['tpl'] : 'SendWeibo';
        $var['isrefresh'] = isset($config['isrefresh']) ? $config['isrefresh'] : '';
        
        $content = view("widgets.send_space",$var)->__toString();

        // 输出数据
        return $content;
    }
}