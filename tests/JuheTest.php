<?php
/**
 * Created by PhpStorm.
 * User: Odeen
 * Date: 2016/6/12
 * Time: 10:11.
 */

namespace Sms\Test;

use Caikeal\LaravelSms\sms\Sms;
use PHPUnit_Framework_TestCase;

class JuheTest extends PHPUnit_Framework_TestCase
{
    protected $sms = null;

    public function setUp()
    {
        $config = 'Juhe';
        $this->sms = new Sms($config);
    }

    public function testGetSmsData()
    {
        $data = $this->sms->getData();
        $this->assertArrayHasKey('to', $data);
        $this->assertArrayHasKey('templates', $data);
        $this->assertArrayHasKey('templateData', $data);
        $this->assertArrayHasKey('content', $data);
        $this->sms->to('...');
        $this->assertEquals('...', $this->sms->getData('to'));
    }

    public function smsData()
    {
        return $this->sms->getData();
    }

    public function testSetTo()
    {
        $this->sms->to('123456...');
        $smsData = $this->smsData();
        $this->assertEquals('123456...', $smsData['to']);
    }

    public function testSetContent()
    {
        $this->sms->content('this is content');
        $smsData = $this->smsData();
        $this->assertEquals('this is content', $smsData['content']);
    }

    public function testSetTemplate()
    {
        $this->sms->template('foo', '111');
        $smsData = $this->smsData();
        $this->assertEquals(['foo' => '111'], $smsData['templates']);

        $this->sms->template(['foo' => '111', 'bar' => '222']);
        $smsData = $this->smsData();
        $this->assertEquals(['foo' => '111', 'bar' => '222'], $smsData['templates']);
    }

    public function testSetData()
    {
        $this->sms->data([
            'code' => '1',
            'msg'  => 'msg',
        ]);
        $smsData = $this->smsData();
        $this->assertEquals([
            'code' => '1',
            'msg'  => 'msg',
        ], $smsData['templateData']);
    }
}
