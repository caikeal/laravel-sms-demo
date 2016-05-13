<?php
/**
 * Created by PhpStorm.
 * User: Odeen
 * Date: 2016/5/8
 * Time: 23:42
 */

namespace LaravelSms\sms;


use LaravelSms\lib\Rest;

class Sms
{
    protected $smsData = [
        'to' => null,
        'templates' => [],
        'templateData' => [],
        'content' => null
    ];

    protected $agent;

    protected $config;

    public function __construct($config)
    {
        $this->config = $config;
    }

    /**
     * send mobile
     * @param $mobile
     * @return $this
     */
    public function to($mobile)
    {
        $this->smsData['to'] = $mobile;
        return $this;
    }

    /**
     * send content for part of sms-providers support content-sms
     * @param $content
     * @return $this
     */
    public function content($content)
    {
        $this->smsData['content'] = $content;
        return $this;
    }

    /**
     * set template-id for part of sms-providers support template-sms
     * @param $agentName
     * @param null $tempId
     * @return $this
     */
    public function template($agentName, $tempId = null)
    {
        if (is_array($agentName)) {
            foreach ($agentName as $k => $v) {
                $this->template($k, $v);
            }
        } elseif ($agentName && $tempId) {
            if (!isset($this->smsData['templates']) || !is_array($this->smsData['templates'])) {
                $this->smsData['templates'] = [];
            }
            $this->smsData['templates']["$agentName"] = $tempId;
        }
        return $this;
    }

    /**
     * set template-data for part of sms-providers support template-sms
     * @param array $data
     * @return $this
     */
    public function data(array $data)
    {
        $this->smsData['templateData'] = $data;
        return $this;
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function send()
    {
        if($this->config=='YunTongXun'){
            $rest=new Rest(config('agents'.$this->config));
            return $rest->sendTemplateSMS($this->smsData['to'],$this->smsData['templateData'],$this->smsData['templates']['YunTongXun']);
        }else{
            throw new \Exception('make sure you have choose a right agent');
        }
    }
}