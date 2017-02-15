<?php
/**
 * Created by PhpStorm.
 * User: Caikeal
 * Date: 2016/8/29
 * Time: 10:56.
 */

namespace LaravelSms\lib;

class Juhe
{
    use CurlTrait;
    protected $appId;

    public function __construct(array $config, $BodyType = 'json')
    {
        $this->appId = $config['appId'];
        if (in_array($BodyType, ['xml', 'json'])) {
            $this->BodyType = $BodyType;
        }
    }

    public function sendTemplateSMS($to, $datas, $tempId)
    {
        $data = '';
        foreach ($datas as $kk => $vv) {
            if (is_array($vv)) {
                throw new \InvalidArgumentException('$datas must be a one-dimensional array, given two-dimensional arrays');
            }

            //处理key
            if (strpos($kk, '#') === false) {
                $key = '#'.$kk.'#';
            } else {
                $key = $kk;
            }
            //处理值
            if (strpos($vv, '#') === false) {
                $value = $vv;
            } else {
                $value = urlencode($vv);
            }

            $data = $data.$key.'='.$value.'&';
        }
        $data = trim($data, '&');
        //生成query params
        $body = ['mobile' => $to, 'tpl_id' => $tempId, 'key' => $this->appId, 'tpl_value' => $data, 'dtype' => $this->BodyType];
        // 生成包头
        $header = ["Accept:application/$this->BodyType", "Content-Type:application/$this->BodyType;charset=utf-8"];
        // 生成请求URL
        $query = http_build_query($body);
        $url = 'http://v.juhe.cn/sms/send?'.$query;
        // 发送请求
        $result = $this->curl_post($url, $body, $header, 0);

        if ($this->BodyType === 'json') {//JSON格式
            $datas = json_decode($result);
        } else { //xml格式
            $datas = simplexml_load_string(trim($result, " \t\n\r"));
        }

        return $datas;
    }
}
