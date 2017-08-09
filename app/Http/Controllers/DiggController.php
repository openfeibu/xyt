<?php

namespace Hifone\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use Auth;
use Hifone\Http\Requests;
use Hifone\Models\SpaceDigg;
use Hifone\Models\BlogDigg;
use Hifone\Models\Space;
use Hifone\Models\Blog;
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

	public function diggBlog()
	{
		$blog_id = intval(Input::get('blog_id'));
		$blog_digg = BlogDigg::where('user_id',Auth::id())->where('blog_id',$blog_id)->first();
		if($blog_digg){
			$blog_digg->delete();
			return [
				'code' => 200,
				'status' => 0,
				'message' => '操作成功',
			];
			Blog::where('id',$blog_id)->decrement('digg_count');
		}
		else{
			BlogDigg::create([
				'user_id' => Auth::id(),
				'blog_id' => $blog_id,
			]);
			Blog::where('id',$blog_id)->increment('digg_count');
			return [
				'code' => 200,
				'status' => 1,
				'message' => '操作成功',
			];
		}
	}
}
