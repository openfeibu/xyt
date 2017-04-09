<?php

namespace Hifone\Services\Repository;

use DB;
use Auth;
use Cache;
use Input;
use Hifone\Models\User;
use Hifone\Models\Setting;

class ConfigRepository{
	
	public function __construct ()
	{
		
	}
	public function getValue ($name)
	{
		$setting = app(Setting::class)->where('name',$name)->first(['value']);
		return $setting->value;
	}
	public function getSetting ($name)
	{
		return app(Setting::class)->where('name',$name)->first();
	}
}
	