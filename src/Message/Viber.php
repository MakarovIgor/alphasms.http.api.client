<?php


namespace igormakarov\AlphaSms\Message;


use igormakarov\AlphaSms\ObjectPropertiesToSnakeCase;

class Viber implements IMessage
{
    private IMessage $message;
    private bool $viber = true;

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
        return $this->message . '&' . (new ObjectPropertiesToSnakeCase())->convert(get_object_vars($this));
    }
}