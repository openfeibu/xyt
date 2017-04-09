<?php

namespace Hifone\Services\Repository;

use Cache;
use DB;
use Auth;
use Input;
use Hifone\Models\User;
use Hifone\Models\Vote;
use Hifone\Models\AllReply;
use Illuminate\Support\Facades\View;


class VoteRepository{
	
	public function newVote($num = '10')
	{
		return app(Vote::class)->recent()->take($num)->get();
	}
	public function hotVote($num = '10')
	{
		return app(Vote::class)->orderBy('user_count','desc')->take($num)->get();
	}
	public function votes ($type = 'new',$num = '20')
	{
		$votes = app(Vote::class);
		switch($type)
		{
			case 'new':
				$votes = $votes->recent();
				break;	
			case 'hot':
				$votes = $votes->orderBy('user_count','desc')->recent();	
				break;
			case 'reward':
				$votes = $votes->recent()->where('reward',1);
				break;
			default:
				$votes = $votes->recent()->where('user_id',Auth::id());	
				break;
		}
		$votes = $votes->paginate($num);
		foreach( $votes as $key => $vote )
		{
			$vote_detail = app('repository')->model(Vote::class)->find($vote->id, $columns = ['id']);
			$vote->vote_options = $vote_detail->options;
			$vote->reply_count = app('repository')->model(AllReply::class)->where(['post_id' => $vote->id])->count();
			$user = User::findByUid($vote->user_id,['avatar_url']);
			$vote->user = $user;
		}
		return $votes;
	}
} 