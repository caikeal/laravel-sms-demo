<?php
/**
 * Created by PhpStorm.
 * User: Odeen
 * Date: 2016/5/8
 * Time: 23:14.
 */
namespace LaravelSms\sms;

use Illuminate\Support\ServiceProvider;

class SmsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/sms.php' => config_path('sms.php'),
        ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/sms.php', 'sms'
        );

        $this->app->singleton('Sms', function ($app) {
            $app = new Sms(config('sms.default'));
            
            return $app;
        });
    }

}