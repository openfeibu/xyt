<?php

namespace Hifone\Services\Repository;

use DB;
use Log;
use Auth;
use Input;
use Cache;
use Hifone\Models\User;
use Hifone\Models\Thread;
use Illuminate\Support\Facades\View;

class ThreadRepository{
	
	public function newThreads($num = '10')
	{
		return app(Thread::class)->recent()->take($num)->get();
	}
	public function hotThreads($num = '10')
	{
		return app(Thread::class)->where('is_excellent',1)->recent()->take($num)->get();
	}
}