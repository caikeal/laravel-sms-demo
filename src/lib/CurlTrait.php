<?php
/**
 * Created by PhpStorm.
 * User: Odeen
 * Date: 2016/5/9
 * Time: 17:34.
 */

namespace LaravelSms\lib;

/**
 * Class CurlTrait
 *
 * @function curl_post($url, $data, $header, $post = 1)
 */
trait CurlTrait
{
    public $BodyType = 'json';
    /**
     * create url post.
     * @param $url
     * @param $data
     * @param $header
     * @param int $post
     *
     * @return string
     */
    public function curl_post($url, $data, $header, $post = 1)
    {
        //初始化curl
        $ch = curl_init();
        //参数设置
        $res = curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_POST, $post);
        if ($post) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        }
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        $result = curl_exec($ch);
        //连接失败
        if ($result === false) {
            if ($this->BodyType === 'json') {
                $result = '{"statusCode":"172001","statusMsg":"网络错误"}';
            } else {
                $result = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?><Response><statusCode>172001</statusCode><statusMsg>网络错误</statusMsg></Response>';
            }
        }
        curl_close($ch);

        return $result;
    }
    
}