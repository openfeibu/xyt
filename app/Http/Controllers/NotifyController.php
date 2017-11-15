<?php
namespace Hifone\Http\Controllers;

use DB;
use Log;
use Hash;
use Mail;
use Auth;
use Input;
use Excel;
use Redirect;
use Validator;
use Carbon\Carbon;
use Hifone\Services\Dates\DateFactory;
use Hifone\Models\User;
use Hifone\Models\Summary;
use Hifone\Models\Activity;
use Hifone\Models\ActivityBanned;
use Hifone\Models\ActivityCategory;
use Hifone\Models\Area;
use Hifone\Models\Album;
use Hifone\Models\Activity_actors;
use Hifone\Models\Vip;
use Hifone\Models\Convert;
use Hifone\Models\Account;
use Hifone\Models\Recharge;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class NotifyController extends Controller
{
	public function __construct()
    {
         parent::__construct();
         $this->middleware('auth',['only' => []]);
		 $this->title = '活动';
    }
    public function activityAliNotify($value='')
    {
        Log::debug("参加活动支付宝支付回调开始");
        //判断通知类型。
        switch (Input::get('trade_status')) {
            case 'TRADE_SUCCESS':
            case 'TRADE_FINISHED':
                // TODO: 支付成功，取得订单号进行其它相关操作。
                $out_trade_no = Input::get('out_trade_no');
                Log::debug('参加活动.', [
                    'out_trade_no' => $out_trade_no,
                    'trade_no' => Input::get('trade_no')
                ]);
                $this->create_activity($out_trade_no);
                break;
        }
		Log::debug('alipay:success');
        return 'success';
    }
    private function create_activity($out_trade_no)
    {
		$activity_actors = Activity_actors::where('out_trade_no',$out_trade_no)->first();
		Activity::where('id',$activity_actors->activity_id)->increment('join_count');
        Activity_actors::where('out_trade_no',$out_trade_no)->update(['pay_status' => 1]);
    }
    public function unActivityBannedAliNotify(Request $request)
    {
		Log::debug("活动解除黑名单支付宝支付回调开始");
        // 判断通知类型。
        switch (Input::get('trade_status')) {
            case 'TRADE_SUCCESS':
            case 'TRADE_FINISHED':
                // TODO: 支付成功，取得订单号进行其它相关操作。
                $out_trade_no = Input::get('out_trade_no');
                Log::debug('活动解除黑名单.', [
                    'out_trade_no' => $out_trade_no,
                    'trade_no' => Input::get('trade_no')
                ]);
                $this->unbanned($out_trade_no);
                break;
        }
		Log::debug('alipay:success');
        return 'success';
    }
    public function unbanned($out_trade_no)
    {
        $activity_banned = app(ActivityBanned::class)->where('out_trade_no',$out_trade_no)->first();
        if($activity_banned->pay_status == 0){
            $result = app(ActivityBanned::class)->where('out_trade_no',$out_trade_no)->update(['pay_status' => 1]);
            $user = User::findByUid($recharge->user_id,['id','coin']);
            User::where('id',$activity_banned->user_id)->update(['activity_banned' => 0]);
            Log::debug('result'.$result);
        }
    }
    public function rechargeAliNotify()
    {
        Log::debug("android支付宝支付回调开始1");
    	// 验证请求。
        /*if (! app('alipay.web')->verify()) {
	        Log::debug('alipay:fail');
            return 'fail';
        }*/
		Log::debug("android支付宝支付回调开始2");
        // 判断通知类型。
        switch (Input::get('trade_status')) {
            case 'TRADE_SUCCESS':
            case 'TRADE_FINISHED':
                // TODO: 支付成功，取得订单号进行其它相关操作。
                $out_trade_no = Input::get('out_trade_no');
                Log::debug('充值', [
                    'out_trade_no' => $out_trade_no,
                    'trade_no' => Input::get('trade_no')
                ]);
                $this->recharge($out_trade_no);
                break;
        }
		Log::debug('alipay:success');
        return 'success';
    }
    private function recharge($out_trade_no)
    {
        $recharge = app(Recharge::class)->where('out_trade_no',$out_trade_no)->first();
        if($recharge->pay_status == 0){
            $result = app(Recharge::class)->where('out_trade_no',$out_trade_no)->update(['pay_status' => 1]);
            $user = User::findByUid($recharge->user_id,['id','coin']);
            User::where('id',$recharge->user_id)->update(['coin' => $user->coin + $recharge->money]);
            Account::create([
                'out_trade_no' => $out_trade_no,
                'user_id' => $recharge->user_id,
                'pay_id' => $recharge->pay_id,
                'payment' => $recharge->payment,
                'pay_type' => 'recharge',
                'coin' => intval($recharge->money),
                'status' => 'succ'
            ]);
            Log::debug('result'.$result);
        }
    }
}
