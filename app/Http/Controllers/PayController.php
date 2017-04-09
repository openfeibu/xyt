<?php

namespace Hifone\Http\Controllers;

use Log;
use Auth;
use Hash;
use Mail;
use Input;
use Redirect;
use Validator;
use Hifone\Models\User;
use Hifone\Models\Vip;
use Hifone\Models\Convert;
use Hifone\Models\Account;
use Hifone\Models\Recharge;
use Hifone\Models\VipRecord;
use Illuminate\Http\Request;
use AltThree\Validator\ValidationException;

class PayController extends Controller
{
    public function __construct()
    {
	    parent::__construct();
        $this->middleware('auth',['except' => ['aliNotify']]);
    }
    public function index(Request $request)
    {
	    $user = Auth::user();
	    $this->breadcrumb->push([
				'账户设置' => route('pay.index'),
                '我的账户' =>  ''      		
        ]);
        $type = isset($request->type) ? $request->type : 'trade' ;
        $view = $this->view('pay.index')->withUser($user)->withType($type);
        switch ($type)
        {
        	case 'trade':
        		$accounts =  app(Account::class)->where('user_id',$user->id)->paginate(20)->appends(['type' => $type]);
        		$view = $view->withAccounts($accounts);
        		break;	
        	case 'convert':
        		$convert = app('configRepository')->getSetting('coin_to_score');  
        		$converts = app('userRepository')->getConverts($user->id,['type' => $type]);
        		$view = $view->withConvert($convert)->withConverts($converts);
        		break;		
        	default:
        		$recharges = app(Recharge::class)->where('user_id',$user->id)->paginate(20)->appends(['type' => $type]);
        		$view = $view->withRecharges($recharges);
        		break;
        }
		return $view;
    }
    public function convertCheck (Request $request)
    {
	    $data = $request->input();
	    $rules = [
	    	'type' => "required|in:score,coin",
	    	'score' => "sometimes|required|integer",
	    	'coin' => 'sometimes|required|integer'
	    ];
	    $message = [
	    	'score.required'	=> '积分不能为空',
	    	'coin.required' => trans('hifone.coin').'不能为空',
	    ];
	    $validator = Validator::make($data,$rules,$message);   
	    if($validator->errors()->first()){
		    return [
				'code' => 201,
				'message' => $validator->errors()->first(),
            ]; 
		}  
	    $user = Auth::user();	    
		$value = app('configRepository')->getValue('coin_to_score');
		$type = $data['type'];
	    if($type == 'score'){
		    if($data['score']%$value != 0){
			     return [
					'code' => 201,
					'message' => '积分必须是'.$value.'的倍数',
			    ];
		    }
		    if($user->score < $data['score']){
			    return [
					'code' => 201,
					'message' => '积分不足',
			    ];
	   	 	}
	   	 	$convert_value = $data['score']/$value;	
	    }
	    if($type == 'coin'){
		    if($user->coin < $data['coin']){
			    return [
					'code' => 201,
					'message' => trans('hifone.coin').'不足',
			    ];
		    }
		    $convert_value = $data['coin'] * $value;
	    }
		return [
			'code' => 200,
			'value' => $convert_value,
	   	];
    }
    public function convert ()
    {
    	$data = Input::get();
	    $rules = [
	    	'type' => "required|in:score,coin",
	    	'score' => "sometimes|required|integer",
	    	'coin' => 'sometimes|required|integer'
	    ];
	    $message = [
	    	'score.required'	=> '积分不能为空',
	    	'coin.required' => trans('hifone.coin').'不能为空',
	    ];
	    $validator = Validator::make($data,$rules,$message);   
	    if($validator->errors()->first()){
		    return  Redirect::back()
			                ->withInput(Input::all())
			                ->withErrors($validator->errors());
		}  
		$user = Auth::user();	
		$value = app('configRepository')->getValue('coin_to_score');
		$type = $data['type'];
		if($type == 'score'){
		    if($data['score']%$value != 0){
			    $errors[] = '积分必须是'.$value.'的倍数';
		    }
		    if($user->score < $data['score']){
			    $errors[] = '积分不足';
	   	 	}
	   	 	if(isset($errors)){
		   	 	return  Redirect::back()
			                ->withInput(Input::all())
			                ->withErrors($errors);
	   	 	}
	   	 	$convert_value = $data['score'] / $value;
	   	 	$coin = $user->coin + $convert_value;
	   	 	$score = $user->score - $data['score'];
	   	 	$user->update(['score' =>$score ]);
	   	 	$user->update(['coin' => $coin ]);
	   	 	Convert::create([
	   	 		'user_id' => $user->id,
				'value' => $data['score'],
				'get_value' => $convert_value,
				'type' => 'score',
	   	 	]);
	    }
	    if($type == 'coin'){
		    if($user->coin < $data['coin']){
			    return  Redirect::back()
			                ->withInput(Input::all())
			                ->withErrors([trans('hifone.coin').'不足']);
		    }
		    $convert_value = $data['coin'] * $value;
		    $coin = $user->coin - $data['coin'];
		    $score = $user->score + $convert_value;
		    $user->update(['coin' => $coin ])	;
	   	 	$user->update(['score' => $score ])	;
	   	 	Convert::create([
	   	 		'user_id' => $user->id,
				'value' => $data['coin'],
				'get_value' => $convert_value,
				'type' => 'coin',
	   	 	]);
	    }
	    return  Redirect::back()
			                ->withInput(Input::all())
			                ->withSuccess('兑换成功');
    }
    public function recharge ()
    {
	    $user = Auth::user();
    	return $this->view('pay.recharge')->withUser($user);
    }
    public function rechargeStore ()
    {
	    $data = Input::get();
	    $rules = [
	    	'pay_id' => "required|in:1,2",
	    	'money' => "sometimes|required|integer",
	    ];
	    $message = [
	    	'pay_id.required'	=> '请选择支付方式',
	    	'pay_id.in'	=> '支付方式不存在',
	    	'money.required' => '充值金额不能为空',
	    	'money.integer' => '充值金额必须为整数',
	    ];
	    $validator = Validator::make($data,$rules,$message); 
	    if($validator->errors()->first()){
		    return  Redirect::back()
			                ->withInput(Input::all())
			                ->withErrors($validator->errors());
		}  
	    $out_trade_no = buildOutTradeNo();
	    Recharge::create([
			'user_id' => Auth::id(),
			'pay_id'  => $data['pay_id'],
			'payment' => trans('hifone.pay_id.'.$data['pay_id']),
			'out_trade_no' => $out_trade_no,
			'money' => $data['money'],
			'pay_status' => 0,
	    ]);
    	// 创建支付单。
	    $alipay = app('alipay.web');
	    $alipay->setOutTradeNo($out_trade_no);
	    $alipay->setTotalFee(0.01);
	    $alipay->setSubject('充值单号：'.$out_trade_no);
	    $alipay->setBody('充值单号：'.$out_trade_no);

	  //  $alipay->setQrPayMode('4'); //该设置为可选，添加该参数设置，支持二维码支付。

	    // 跳转到支付页面。
	    return redirect()->to($alipay->getPayLink());
    }
    public function aliNotify ()
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
                Log::debug('Alipay notify post data verification success.', [
                    'out_trade_no' => $out_trade_no,
                    'trade_no' => Input::get('trade_no')
                ]);
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
                
                break;
        }
		Log::debug('alipay:success');
        return 'success';
    }
    public function buy ()
    {
	    $this->breadcrumb->push([
				'账户设置' => route('pay.index'),
                '开通VIP' =>  ''      		
        ]);
	    $user = Auth::user();
	    $vips = app(Vip::class)->orderBy('id','asc')->get();
	    $vip_records = app(VipRecord::class)->where('user_id',$user->id)->orderBy('id','desc')->get();
    	return $this->view('pay.buy')->withUser($user)->with('vip_records',$vip_records)->withVips($vips);
    }
    public function buyStore ()
    {
    	$data = Input::get();
	    $rules = [
	    	'vip_id' => "required|exists:vips,id",
	    ];
	    $message = [
	    	'vip_id.required'	=> '请选择购买类型',
	    ];
	    $validator = Validator::make($data,$rules,$message); 
	    if($validator->errors()->first()){
		    return  Redirect::back()
			                ->withInput(Input::all())
			                ->withErrors($validator->errors());
		}  
		$user = Auth::user();
		$vip = app(Vip::class)->where('id',$data['vip_id'])->first();
		if($user->coin < $vip->coin){
			return  Redirect::back()
			                ->withInput(Input::all())
			                ->withErrors([trans('hifone.coin').'不足']);
		}
		app(User::class)->where('id',$user->id)->update(['coin' => $user->coin - $vip->coin]);
		$result = app('userRepository')->beVip($user,intval($vip->duration));
		
		if(!$result){
			return  Redirect::back()
			                ->withInput(Input::all())
			                ->withSuccess('管理员不能购买VIP');
		}
		VipRecord::create([
			'user_id' => $user->id,
			'vip_id' => $vip->id,
			'coin' => $vip->coin,
			'duration' => $vip->duration,
			'name' => $vip->name,
		]);
		$out_trade_no = buildOutTradeNo();
		Account::create([
			'out_trade_no' => $out_trade_no,
			'user_id' => $user->id,
			'pay_id' => 3,
			'payment' => trans('hifone.pay_id.3'),
			'pay_type' => 'vip',
			'coin' => $vip->coin,
			'status' => 'succ'
        ]);
        return  Redirect::back()
			                ->withInput(Input::all())
			                ->withSuccess('购买成功');
    }
}
?>
