<?php


namespace igormakarov\AlphaSms\Message;


class StatusesCodes
{
    public static $AWAITING = 0;
    public static $PENDING = 1;
    public static $SENT = 2;
    public static $DELIVERED = 3;
    public static $OUT_OF_TOUCH = 5;
    public static $REMOVED = 10;
    public static $PARTIALLY_DELIVERED = 50;
    public static $NETWORK_FAILURE = 96;
    public static $PHONE_NUMBER_ERROR = 99;
    public static $READ_VIBER = 116;
}
