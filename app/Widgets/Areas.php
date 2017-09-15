<?php

namespace Hifone\Widgets;

use Arrilot\Widgets\AbstractWidget;
use Hifone\Models\Area;
use Hifone\Models\User;
use Hifone\Models\UserStandard;

class Areas extends AbstractWidget
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
	    $data = $this->config;
	    $list = app('categoryTreeRepository')->setTable('areas',app(Area::class))->getNetworkList();
	    $tmp = array();
        foreach ($list as $key => $value) {
            $tmp['area_'.$key] = $value;
        }
        $list = $tmp;
        unset($tmp);

        $data['list'] = json_encode($list);

	    if($data['type'] == 'location'){

	    	$user = User::findByUidOrFail($data['user_id'],['province','city','location']);

			$data['selected'] =  $user->province.','.$user->city ;

			$data['current_name'] = $user->location;

	    }else if($data['type'] == 'homeplace'){

		    $user = User::findByUidOrFail($data['user_id'],['home_province','home_city','homeplace']);

			$data['selected'] =  $user->home_province.','.$user->home_city ;

			$data['current_name'] = $user->homeplace;

	    }else if($data['type'] == 'oplocation'){

		    $user_standard = UserStandard::findByUidOrFail($data['user_id'],['opprovince','opcity','oplocation']);

			$data['selected'] =  $user_standard->opprovince.','.$user_standard->opcity ;

			$data['current_name'] = $user_standard->oplocation;


	    }
	    else{
		    $data['selected'] = $data['current_name'] = '';
	    }
	    return view('areas.area',$data)->render();
    }
}
