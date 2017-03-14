# laravel-sms-demo
[![StyleCI](https://styleci.io/repos/58302704/shield)](https://styleci.io/repos/58302704)
[![Build Status](https://travis-ci.org/caikeal/laravel-sms-demo.svg?branch=master)](https://travis-ci.org/caikeal/laravel-sms-demo)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/caikeal/laravel-sms-demo/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/caikeal/laravel-sms-demo/?branch=master)
[![Latest Stable Version](https://img.shields.io/packagist/v/keal/laravel-sms.svg)](https://packagist.org/packages/keal/laravel-sms)
[![Total Downloads](https://img.shields.io/packagist/dt/keal/laravel-sms.svg)](https://packagist.org/packages/keal/laravel-sms)

## 支持云通讯和聚合数据
## 安装
支持Laravel > 5.1.*，php > 5.6.4

`composer require keal/laravel-sms`

##注册ServiceProvider
在`app.php`中加入
`Caikeal\LaravelSms\sms\SmsServiceProvider::class`

##添加Facade
在`app.php`中加入
`'Sms' => Caikeal\LaravelSms\sms\Facades\Sms::class`

##配置config
`php artisan vendor:publish`

##使用
1. \Sms::to("这里填写手机号")->template('YunTongXun', 具体的模版id)->data(["模版变量1内容", "模版变量2内容", ...])->send();
2. \Sms::to("这里填写手机号")->template('Juhe', 具体的模版id)->data(['模板变量'=>对应的值])->send();