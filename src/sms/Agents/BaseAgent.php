<?php
/**
 * Created by PhpStorm.
 * User: Odeen
 * Date: 2016/5/9
 * Time: 17:31
 */

namespace LaravelSms\sms\Agents;


class BaseAgent
{
    const SUCCESS = 'success';
    const INFO = 'info';
    const CODE = 'code';

    /**
     * The configuration information of agent.
     *
     * @var array
     */
    protected $config = [];

    /**
     * The result data.
     *
     * @var array
     */
    protected $result = [
        self::SUCCESS => false,
        self::INFO    => null,
        self::CODE    => 0,
    ];

    /**
     * Constructor.
     *
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        $this->config($config);
    }


    /**
     * Get or set the configuration information of agent.
     *
     * @param mixed $key
     * @param mixed $value
     *
     * @return mixed
     */
    public function config($key = null, $value = null)
    {
        if (is_array($key) && is_bool($value)) {
            $override = $value;
        }
    }
}