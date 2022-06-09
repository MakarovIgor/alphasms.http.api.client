<?php

namespace igormakarov\AlphaSms;

use igormakarov\AlphaSms\Message\IMessage;

class Routes
{
    private string $url = 'https://alphasms.ua/api/http.php?version=http';

    public function __construct(string $apiKey)
    {
        $this->url = $this->url . '&key=' . $apiKey;
    }

    public function sendMessage(IMessage $message): string
    {
        return $this->url . '&command=send&' . $message;
    }

    public function balance(): string
    {
        return $this->url . '&command=balance';
    }

    public function smsPriceByNumber($phone): string
    {
        return $this->url . '&command=price&to=' . $phone;
    }

    public function messageStatus(int $id): string
    {
        return $this->url . '&command=receive&id=' . $id;
    }

}

