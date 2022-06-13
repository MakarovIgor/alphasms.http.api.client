<?php


namespace igormakarov\AlphaSms\Message;


class MessageStatus
{
    public string $status, $code, $time;

    public function __construct(string $status, string $code, string $time)
    {
        $this->status = $status;
        $this->code = $code;
        $this->time = $time;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getTime(): string
    {
        return $this->time;
    }
}