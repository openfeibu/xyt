<?php

namespace Hifone\Services\Repository;

use DB;
use Auth;
use Input;
use Cache;
use Hifone\Models\User;
use Hifone\Models\Activity;
use Hifone\Models\Activity_actors;
use Hifone\Models\Summary;
use Illuminate\Support\Facades\View;

class ActivityRepository{
	public function newActivities ($num = '10')
	{
		return app(Activity::class)->recent()->take($num)->get();
	}
	public function summaries ($num = '10')
	{
		return app(Summary::class)->join('activities','activities.id','=','summaries.activity_id')->orderBy('summaries.id','desc')->take($num)->get(['summaries.*']);
	}
	public function photos ($num = '10')
	{
		return app(AlbumPhoto::class)->recent()->where('type','activity')->take($num)->get();
	}
	public function getActivityJoins($activity_id)
	{
		$activity_joins = Activity_actors::select('users.avatar_url','users.username','activity_actors.user_id')
											->join('users','users.id','=','activity_actors.user_id')
											->where('activity_id',$activity_id)
											->where('actor_type','join')
											->distinct()
											->get();
		$activity_joins = app('userRepository')->handleUsers($activity_joins);
		return $activity_joins;
	}
	public function getActivityFollows($activity_id)
	{
		$activity_follows = Activity_actors::select('users.avatar_url','users.username','activity_actors.user_id')
											->join('users','users.id','=','activity_actors.user_id')
											->where('activity_id',$activity_id)
											->where('actor_type','follow')
											->distinct()
											->get();
		$activity_follows = app('userRepository')->handleUsers($activity_follows);
		return $activity_follows;
	}
}
