# Alisms - iscms中针对阿里大鱼的Laravel-5封装

###使用方法:

1. 使用命令行定位到您的项目下运行composer require iscms/alisms-for-laravel
2. 完毕以后,需要将iscms\Alisms\AlidayuServiceProvider::class添加到config\app.php的providers下
3. 请运行php artisan vendor:publish将所需要的配置文件发布到您的config目录
4. 您的config目录应该增加了alisms配置文件

```php
<?php
    return [
        'KEY' =>env('ALISMS_KEY',null),
        'SECRETKEY'=>env('ALISMS_SECRETKEY',null),
    ];
```

您可以将您的配置项写入env文件
在您的控制器使用use iscms\Alisms\SendsmsPusher as Sms; 

```php
    public function __construct(Sms $sms)
    {
       $this->sms=$sms;
    }
    /**
    * @param $phone 接收人手机号码
    * @param $name  短信签名,可以在阿里大鱼的管理中心看到
    * @param $content 内容 应该以json格式传入"{'code':'1234','product':'alidayu'}"对应模板中的字符
    * @param $code 短信模板编号 exp:SMS_4955428 在阿里大鱼里找
    */
    public function index()
    {
       $result=$this->sms->send('$phone','$name',"$content",'$code');
    }
```
