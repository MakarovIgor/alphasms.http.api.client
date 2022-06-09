<?php

require_once 'vendor/autoload.php';

use GuzzleHttp\Exception\GuzzleException;
use igormakarov\AlphaSms\AlphaSmsHttpClient;
use igormakarov\AlphaSms\Models\Message;
use igormakarov\AlphaSms\Models\Sms;
use igormakarov\AlphaSms\Models\Viber;
use igormakarov\AlphaSms\Routes;

try {
    $msg = new Message("2342", "38067", "text test");
    $msg->setAskDate('Денежный Календарь');
    //var_dump($msg->__toString());

    $routes = new Routes('e1b1b25660a2268e64431e55cfa70d0dbe2c06eb');
    //echo $routes->sendMessage($msg);

    $sms = new Sms("0", "1", "text test");
    echo $sms;
    /*$routes = new Routes('e1b1b25660a2268e64431e55cfa70d0dbe2c06eb');
    echo $routes->sendMessage($sms);*/
    echo '\n';
    $vsms = new Viber("2", "3", "text eaw");
    echo $vsms;
   /* $client = new AlphaSmsClient('e1b1b25660a2268e64431e55cfa70d0dbe2c06eb');
    var_dump($client->getBalance());

    $s = $client->getSmsPriceByNumber("+380679040443");
    var_dump($s);

    $s = $client->getMessageStatus(0);
    var_dump($s);*/



} catch (Exception $ex) {
    echo 'error: ' . $ex->getMessage();
} catch (GuzzleException $ex) {
    echo 'error: ' . $ex->getMessage();
}
