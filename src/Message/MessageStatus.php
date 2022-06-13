<?php


namespace igormakarov\AlphaSms\Message;


class MessageStatus
{
    private string $status, $code, $time;

    public function __construct(string $status, string $code, string $time)
    {
        $this->status = $status;
        $this->code = $code;
        $this->time = $time;
    }

    public function code(): string
    {
        return $this->code;
    }

    public function status(): string
    {
        return $this->status;
    }

    public function time(): string
    {
        return $this->time;
    }
}