<?php

namespace Hifone\Widgets;

use Auth;
use Arrilot\Widgets\AbstractWidget;
use Hifone\Models\Space;
use Hifone\Models\SpaceDigg;
use Hifone\Models\UserFollow; 
use Illuminate\Support\Facades\View;

class FeedList extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

	private $limitnums = 10;

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
        //
		/* # 创建默认参数 */
        $var = [
            'loadmore' => 1,
            'loadnew' => 1,
            'initNums' => 140,
        ];
        /* # 合并自定义参数 */
        is_array($this->config) and $var = array_merge($var,$this->config);

		$content = app('spaceRepository')->getData($var, '_FeedList');

         /* # 查看是否有更多数据 */
        if (empty($content['html'])) {
            $var['list'] = '';
			$var['lastId'] = 0;
            $var['firstId'] = 0;
            $var['pageHtml'] = '';	
        /* # 解析数据 */
        } else {
            /* # 是有前置 */
            $content['firstId'] or $var['loadmore'] = 0;

            /* # 赋予数据 */
            $var['list'] = $content['html'];
            $var['lastId'] = $content['lastId'];
            $var['firstId'] = intval($content['firstId']);
            $var['pageHtml'] = $content['pageHtml'];
        }

        /* # 获取HTML内容 */
		$content = view("widgets.feed_list", [
            'var' => $var,
        ]);
        
        /* # 注销变量 */
        unset($var);

        /* # 返回数据 */
        return $content;
    }
   
}