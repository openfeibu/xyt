<?php

namespace Hifone\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use Auth;
use Hifone\Http\Requests;
use Hifone\Models\SpaceDigg;
use Hifone\Models\Space;
use Hifone\Models\User;

class DiggController extends Controller
{
	public function __construct ()
	{
		$this->middleware('auth');

	}
    public function addDigg()
    {
        $space_id = intval(Input::get('space_id'));
        $result = app('spaceDiggRepository')->addDigg($space_id, Auth::id());
        if ($result) {
            $res['status'] = 1;
            $res['info'] = app('spaceDiggRepository')->getLastError();
        } else {
            $res['status'] = 0;
            $res['info'] = app('spaceDiggRepository')->getLastError();
        }
        exit(json_encode($res));
    }

    public function delDigg()
    {
        $space_id = intval(Input::get('space_id'));
        $result = app('spaceDiggRepository')->delDigg($space_id, Auth::id());
        if ($result) {
            $res['status'] = 1;
            $res['info'] = app('spaceDiggRepository')->getLastError();
        } else {
            $res['status'] = 0;
            $res['info'] =  app('spaceDiggRepository')->getLastError();
        }
        exit(json_encode($res));
    }

}
