# laravel-sms-demo
## 支持云通讯，尝试写个可能不太完美^_^
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