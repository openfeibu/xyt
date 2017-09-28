<?php
return [

	// 安全检验码，以数字和字母组成的32位字符。
	'key' => 'gc9w75145bo5d4ogka5e5wtg3wa4y9x0',

	//签名方式
	'sign_type' => 'MD5',

	// 服务器异步通知页面路径。
	'notify_url' => config('app.url').'/pay/aliNotify',

	'activity_notify_url' => config('app.url').'/activity/aliNotify',

	// 页面跳转同步通知页面路径。
	'return_url' => config('app.url').'/pay/recharge'
];
