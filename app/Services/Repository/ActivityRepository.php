<?php

namespace Hifone\Services\Repository;

use DB;
use Auth;
use Input;
use Cache;
use Hifone\Models\User;
use Hifone\Models\Activity;
use Hifone\Models\Summary;
use Illuminate\Support\Facades\View;

class ActivityRepository{
	public function newActivities ($num = '10')
	{
		return app(Activity::class)->recent()->take($num)->get();
	}
	public function summaries ($num = '10')
	{
		return app(Summary::class)->recent()->take($num)->get();
	}
	public function photos ($num = '10')
	{
		return app(AlbumPhoto::class)->recent()->where('type','activity')->take($num)->get();
	}
}