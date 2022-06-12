<?php

namespace igormakarov\AlphaSms\Message;

use igormakarov\AlphaSms\PropertiesToHttpQuery;

class Message implements IMessage
{
    private string $from, $to, $message, $wap;
    private bool $flash;
    private string $askDate;

    public function __construct(string $from, string $to, string $text)
    {
        $this->from = $from;
        $this->to = $to;
        $this->message = $text;
    }

    public function setWap(string $wap): void
    {
        $this->wap = $wap;
    }

    public function setFlash(bool $isFlash): void
    {
        $this->flash = $isFlash;
    }

    public function setAskDate(string $askDate): void
    {
        $this->askDate = $askDate;
    }

    public function __toString(): string
    {
        return (new PropertiesToHttpQuery())->convert(get_object_vars($this));
    }

}
