<?php

namespace igormakarov\AlphaSms\Message;

class Sms implements IMessage
{
    private IMessage $message;

    public function __construct(string $from, string $to, string $text)
    {
        $this->message = new Message($from, $to, $text);
    }

    public function setWap(string $wap): void
    {
        $this->message->setWap($wap);
    }

    public function setFlash(bool $isFlash): void
    {
        $this->message->setFlash($isFlash);
    }

    public function setAskDate(string $askDate): void
    {
        $this->message->setAskDate($askDate);
    }

    public function __toString(): string
    {
        return $this->message->__toString();
    }
}