# alphasms.php.api - клієнт для роботи з HTTP API aplhasms.ua  сервісу по відправці смс 


   $client = new AlphaSmsHttpClient('e1b1b25660a2268e64431e55cfa70d0dbe2c06eb');
    var_dump($client->getBalance());
    $s = $client->getSmsPriceByNumber("+3809890123");
    var_dump($s);

    exit;*/
    $smsId = $client->sendMessage(new Sms("alphaNameOrPhonrNumber", "your phone", "message text"));
    echo 'smsId = ' . $smsId;
   /* $smsStatus = $client->getMessageStatus($smsId);
