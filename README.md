# alphasms.php.api - клієнт для роботи з HTTP API aplhasms.ua сервісу по відправці смс 

#### Увага:

> Не реалізована відправка запланованных повідомлень, а також Viber-повідомлень, але для розширення вже є підгрунтя, наприклад класс Viber - залишилося лише дописаті назву полів у стилі camelCase і задати потрібні данні цим полям, а також зверніть увагу на метод **toString() - классів які імплементують інтерфейс IMessage**
 
#### Офіційна документація:
https://alphasms.ua/storage/files/alphasms-api-http-1.5.4.pdf

#### Підключення:

composer require igormakarov/alphasms.php.api - https://packagist.org/packages/igormakarov/alphasms.php.api
```php
require_once 'vendor/autoload.php';
```

 #### Ініціалізація і робота з клієнтом:

Ініціалізація
```php
$client = new AlphaSmsHttpClient('yourApiKey');
```
Отримати баланс 
```php
$client->getBalance(): float 
```
Переверіка ціни смс по номеру телефона
```php
$client->getSmsPriceByNumber("+yourNumber"): \igormakarov\AlphaSms\SmsPrice - має інформацію про смс з ціною та валютою
```
Відправка смс
```php
$smsId = $client->sendMessage(new Sms("alphaNameOrPhoneNumber", "to phone", "message text")): int - id смс
```
Отримати статус повідомлення
```php
$smsStatus = $client->getMessageStatus($smsId): \igormakarov\AlphaSms\Message\MessageStatus - має інформацію про статус повідомлення код, та дату
```


#### Запуск тестів
```cli
composer unit-tests
```
