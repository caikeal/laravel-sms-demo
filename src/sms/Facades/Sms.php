<?php
/**
 * Created by PhpStorm.
 * User: Odeen
 * Date: 2016/5/12
 * Time: 21:58.
 */

namespace Caikeal\LaravelSms\sms\Facades;

use Illuminate\Support\Facades\Facade as LaravelFacade;

/**
 * Class Sms.
 *
 * @see \Caikeal\LaravelSms\sms\SmsServiceProvider
 */
class Sms extends LaravelFacade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'Sms';
    }
}
