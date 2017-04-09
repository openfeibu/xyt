<?php

/*
 * This file is part of Hifone.
 *
 * 
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Hifone\Widgets;

use Hifone\Models\ActivityCategory;
use Arrilot\Widgets\AbstractWidget;
use Hifone\Models\Ad\Adblock as AdblockModel;
use Widget;

class ActivityCategoryWidget extends AbstractWidget
{
    protected $items = [];
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [
       
    ];

    public function run()
    {
	    $data = $this->config;
	    $list = app('categoryTreeRepository')->setTable('activity_catagories',app(ActivityCategory::class))->getNetworkList();
	    $tmp = array();
        foreach ($list as $key => $value) {
            $tmp['cata_'.$key] = $value;
        }
        $list = $tmp;
        
        unset($tmp);
        $data['list'] = json_encode($list);
        $data['selected'] =  '' ;
		$data['current_name'] = '';
		return view('widgets.activity_category',$data)->render();
    }
}