<?php
/**
 * 表情模型 - 业务逻辑模型
 * @author jason <yangjs17@yeah.net>
 * @version TS3.0
 */
namespace Hifone\Services\Repository;

use Log;
use Session;
use iscms\Alisms\SendsmsPusher as Sms;

class SmsRepository
{
	public function __construct ()
	{
		
	}
	public function send ($mobile,$type)
	{
		$code = getCode();
		Session::put($type.'sms_code', $code,30);
		Session::put($type.'mobile', $mobile,30);
		switch($type){
			case 'changeMobile':
				$result = $this->sendSms($mobile,config('alisms.changMobile'),$code);
				break;
			case 'forgetPasswordMobile':
				$result = $this->sendSms($mobile,config('alisms.changMobile'),$code);
				break;
			case 'registerMobile':
				$result = $this->sendSms($mobile,config('alisms.changMobile'),$code);
				break;
			default:
				$result = false;
				break;
		}
		if($result){
			return [
				'code' => 200,
			];
		}else{
			return [
				'code' => 201,
			];
		}
	}
	public function checkCode ($type,$code,$mobile = '')
	{
		$session_code = Session::get($type.'sms_code');
		$session_mobile = Session::get($type.'mobile');
		if(($mobile && $session_mobile != $mobile) || $code != $session_code){
			return [
				'code' => 201,
				'message' => '验证码错误'
			];
		}
		return [
			'code' => 200,
			'mobile' => $session_mobile
		];
	}
	private function sendSms($mobile,$name,$code)
	{
		$result = app('iscms\Alisms\SendsmsPusher')->send("$mobile","校汇","{\"code\":\"$code\",\"product\":\"".config('app.web_name')."\"}","$name");
		if (!isset($result->result->err_code) or $result->result->err_code !== '0') {
			Log::error('----------------------------------------------------------------');
			Log::error('短信发送故障，收到阿里大于的错误信息：' . serialize($result));
			Log::error('----------------------------------------------------------------');
			return false;
		}
		return true;
	}
}