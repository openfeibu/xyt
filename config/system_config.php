<?php



return [
	'feed' => [
		'weibo_nums' => 140,
		'weibo_premission' => [
            'repost',
            'comment',
    	]
	],
	'anonymous_integral' => 5,
	'no_album_photo' => '/images/nopic.gif',

	'attach' => [
		"attach_path_rule" => "Y/md/H/",
  		"attach_max_size" => "100",
  		"attach_allow_extension" => "png,jpeg,zip,rar,doc,xls,ppt,docx,xlsx,pptx,pdf,jpg,gif,mp3"
	],
	'attachimage' => [
		"attach_max_size" => "2",
	  	"attach_allow_extension" => "png,gif,jpg,jpeg",
	  	"auto_thumb" => 0
	],
];
