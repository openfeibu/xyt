<?php

/*
 * This file is part of Hifone.
 *
 *
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Hifone\Http\Controllers;

use Auth;
use Hifone\Commands\Follow\AddFollowCommand;
use Hifone\Models\Thread;
use Hifone\Models\User;
use Hifone\Models\Follow;
use Illuminate\Support\Facades\Response;

class FollowController extends Controller
{
	public function __construct()
    {
	    parent::__construct();
	}
    public function createOrDelete(Thread $thread)
    {
        dispatch(new AddFollowCommand($thread));

        return Response::json(['status' => 1]);
    }

    public function createOrDeleteUser(User $user)
    {
        if ($user->id == Auth::user()->id) {
            return Response::json(['status' => -1]);
        }

        dispatch(new AddFollowCommand($user));

		if ($user->follows()->forUser(Auth::id())->count()) {
			return Response::json(['status' => 1]);
        } else {
	        return Response::json(['status' => 2]);
        }

    }
}
