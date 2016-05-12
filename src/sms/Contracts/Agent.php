<?php
/**
 * Created by PhpStorm.
 * User: Odeen
 * Date: 2016/5/9
 * Time: 17:24
 */

namespace LaravelSms\sms\Contracts;


interface Agent
{
    public function sendSms($to, $content, $tempId, array $tempData);

    public function sendContentSms($to, $content);

    public function sendTemplateSms($to, $tempId, array $tempData);
}