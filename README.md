# alphasms.php.api - клієнт для роботи з HTTP API aplhasms.ua  сервісу по відправці смс 


   $client = new AlphaSmsHttpClient('apiKey');
    var_dump($client->getBalance());
    $s = $client->getSmsPriceByNumber("+3809890123");
    var_dump($s);

    exit;*/
    $smsId = $client->sendMessage(new Sms("alphaNameOrPhonrNumber", "your phone", "message text"));
    echo 'smsId = ' . $smsId;
   /* $smsStatus = $client->getMessageStatus($smsId);
