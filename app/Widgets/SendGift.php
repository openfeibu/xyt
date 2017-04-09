<?php

namespace Hifone\Widgets;

use Auth;
use Hifone\Models\Gift;
use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Facades\View;

class SendGift extends AbstractWidget
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

		$data = $this->config;
		$user = $data['user'];
	   	$gifts = Gift::get();
	   	
        $content = view("widgets.send_gift")->with('gifts',$gifts)->with('user',$user)->__toString();

        // 输出数据
        return $content;
    }
}