<?php
/**
 * Created by PhpStorm.
 * User: Odeen
 * Date: 2016/5/9
 * Time: 17:30
 */

namespace LaravelSms\sms\Agents;


use LaravelSms\sms\Contracts\Agent;

class YunTongXunAgent extends BaseAgent implements Agent
{

    public function sendSms($to, $content, $tempId, array $tempData)
    {
        // TODO: Implement sendSms() method.
    }

    public function sendContentSms($to, $content)
    {
        // TODO: Implement sendContentSms() method.
    }

    public function sendTemplateSms($to, $tempId, array $tempData)
    {
        // TODO: Implement sendTemplateSms() method.
    }
}