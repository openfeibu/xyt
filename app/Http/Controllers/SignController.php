<?php
namespace Hifone\Http\Controllers;

use Auth;
use Hifone\Models\User;
use Hifone\Models\Credit;
use Hifone\Models\Sign;
use DB;

class SignController extends Controller
{
    public function index()
    {
        $begin = mktime(0,0,0,date('m'),date('d'),date('Y'));
		$end = mktime(23,59,59,date('m'),date('d'),date('Y'));

        $sign = app(Sign::class)->whereBetween('created_at',[dtime($begin),dtime($end)])->where('user_id',Auth::id())->first();
        if($sign)
        {
            return [
                'code' => 201,
                'message' => '请明天再来吧！',
            ];
        }else{
            Sign::create([
                'user_id' => Auth::id(),
            ]);
            return [
                'code' => 200,
                'message' => '签到成功！',
            ];
        }
    }
}
