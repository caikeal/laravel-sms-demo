<?php
/**
 * Created by PhpStorm.
 * User: Odeen
 * Date: 2016/5/12
 * Time: 21:58
 */

namespace LaravelSms\sms;
use Illuminate\Support\Facades\Facade as LaravelFacade;

class SmsFacade extends LaravelFacade
{
    protected static function getFacadeAccessor()
    {
        return 'Sms';
    }
}