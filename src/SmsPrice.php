<?php


namespace igormakarov\AlphaSms;


class SmsPrice
{
    private float $price;
    private string $currency;

    public function __construct(float $price, string $currency)
    {
        $this->price = $price;
        $this->currency = $currency;
    }


    public function getCurrency(): string
    {
        return $this->currency;
    }

    public function getPrice(): float
    {
        return $this->price;
    }
}