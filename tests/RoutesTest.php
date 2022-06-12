<?php

namespace igormakarov\AlphaSms;

use igormakarov\AlphaSms\Message\Sms;
use PHPUnit\Framework\TestCase;

class RoutesTest extends TestCase
{
    private string $apiKey = '12374681234yjxhgd';

    public function testSmsPriceByNumber()
    {
        $phone = "+123123123";
        $this->assertStringContainsString(
            'command=price&to=' . $phone,
            (new Routes($this->apiKey))->smsPriceByNumber($phone)
        );
    }

    public function testSendSmsMessage()
    {
        $this->assertStringContainsString(
            'from=%2B3242&to=%2B38067&message=message+text',
            (new Routes($this->apiKey))->smsPriceByNumber(
                new Sms("+3242", "+38067", "message text")
            )
        );
    }

    public function testBalance()
    {
        $this->assertStringContainsString('command=balance', (new Routes($this->apiKey))->balance());
    }

    public function testMessageStatus()
    {
        $this->assertStringContainsString(
            'command=receive&id=1123',
            (new Routes($this->apiKey))->messageStatus(1123)
        );
    }
}
