<?php

namespace Hifone\Widgets;

use Arrilot\Widgets\AbstractWidget;
use Hifone\Models\SpaceDigg;

class Digg extends AbstractWidget
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
        //
		$data = $this->config;
        $var['space_id'] = intval($data['space_id']);
        $var['digg_count'] = intval($data['digg_count']);
        $var['diggArr'] = (array) $data['diggArr'];
        $var['diggId'] = empty($data['diggId']) ? 'digg' : t($data['diggId']);

        return view("widgets.digg", [
            'var' => $var,
        ]);
    }
    
}