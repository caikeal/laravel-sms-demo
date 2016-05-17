# laravel-sms-demo
## 支持云通讯
## 安装
`composer require keal/laravel-sms:dev-master`

##注册ServiceProvider
在`app.php`中加入
`LaravelSms\sms\SmsServiceProvider::class`

##添加Facade
在`app.php`中加入
`'Sms' => LaravelSms\sms\SmsFacade::class`

##配置config
`php artisan vendor:publish`

##使用
Sms::to("这里填写手机号")->template('YunTongXun',具体的模版id)->data("模版内容数组")->send();