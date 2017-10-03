<?php
/**
 * 表情模型 - 业务逻辑模型
 * @author jason <yangjs17@yeah.net>
 * @version TS3.0
 */
namespace Hifone\Services\Repository;

use Log;
use Session;
use iscms\Alisms\SendsmsPusher as Sms; //阿里大于
use Aliyun\Core\Config;
use Aliyun\Core\Profile\DefaultProfile;
use Aliyun\Core\DefaultAcsClient;
use Aliyun\Api\Sms\Request\V20170525\SendSmsRequest; //阿里云通信
use Aliyun\Api\Sms\Request\V20170525\QuerySendDetailsRequest;

Config::load();

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
	/*
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
	}*/
	private function sendSms($mobile,$name,$code)
	{
		// 短信API产品名
        $product = "Dysmsapi";

        // 短信API产品域名
        $domain = "dysmsapi.aliyuncs.com";

        // 暂时不支持多Region
        $region = "cn-hangzhou";

        // 服务结点
        $endPointName = "cn-hangzhou";

        // 初始化用户Profile实例
        $profile = DefaultProfile::getProfile($region,config('alisms.accessKeyId') , config('alisms.accessKeySecret'));

        // 增加服务结点
        DefaultProfile::addEndpoint($endPointName, $region, $product, $domain);

        // 初始化AcsClient用于发起请求
        $acsClient = new DefaultAcsClient($profile);

		// 初始化SendSmsRequest实例用于设置发送短信的参数
        $request = new SendSmsRequest();

        // 必填，设置雉短信接收号码
        $request->setPhoneNumbers($mobile);

        // 必填，设置签名名称
        $request->setSignName(config('alisms.signName'));

        // 必填，设置模板CODE
        $request->setTemplateCode($name);

        // 可选，设置模板参数
		$templateParam = "{\"code\":\"$code\"}";

        $request->setTemplateParam($templateParam);

        // 发起访问请求
        $acsResponse = $acsClient->getAcsResponse($request);

		// 打印请求结果
	    if (isset($acsResponse->Code) && $acsResponse->Code == 'OK') {
	        return true;
	    } else {
			Log::error('----------------------------------------------------------------');
			Log::error('短信发送故障，收到阿里云通信的错误信息：' . serialize($acsResponse));
			Log::error('----------------------------------------------------------------');
	        return false;
	    }

	    return $acsResponse;
	}
}
