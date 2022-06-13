<?php

namespace igormakarov\AlphaSms;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use igormakarov\AlphaSms\Message\IMessage;
use igormakarov\AlphaSms\Message\MessageStatus;

class AlphaSmsHttpClient
{
    private Client $httpClient;
    private Routes $routes;

    public function __construct(string $apiKey)
    {
        $this->httpClient = new Client();
        $this->routes = new Routes($apiKey);
    }

    /**
     * @throws GuzzleException
     * @throws Exception
     */
    public function getBalance(): float
    {
        $response = $this->sendRequest($this->routes->balance());
        return $response['balance'];
    }

    /**
     * @throws GuzzleException
     * @throws Exception
     */
    public function getMessageStatus(int $id): MessageStatus
    {
        $response = $this->sendRequest($this->routes->messageStatus($id));
        return new MessageStatus($response['status'], $response['code'], $response['status_time']);
    }

    /**
     * @throws GuzzleException
     * @throws Exception
     */
    public function getSmsPriceByNumber(string $phone): SmsPrice
    {
        if (empty($phone)) {
            throw new Exception("Phone number is empty!");
        }
        $response = $this->sendRequest($this->routes->smsPriceByNumber($phone));

        return new SmsPrice((float)$response["price"], $response['currency']);
    }

    /**
     * @throws GuzzleException
     * @throws Exception
     */
    public function sendMessage(IMessage $message): int
    {
        $response = $this->sendRequest($this->routes->sendMessage($message));
        return (int)$response['id'];
    }

    /**
     * @throws GuzzleException
     * @throws Exception
     */
    protected function sendRequest(string $url, array $params = []): array
    {
        $response = $this->httpClient->request("GET", $url, $params);
        $content = $response->getBody()->getContents();
        $this->validateResponse($content);
        return $this->textResponseToArray($content);
    }

    /**
     * @throws Exception
     */
    protected function textResponseToArray(string $responseText): array
    {
        $clearData = [];
        $explodedArray = explode(",", rtrim(str_replace("\n", ',', $responseText), ','));
        foreach ($explodedArray as $array) {
            $val = explode(':', $array);
            $clearData[$val[0]] = $val[1];
        }
        return $clearData;
    }

    protected function prepareErrors(string $responseText): string
    {
        $responseText = trim(str_replace("\nerrors:", "\n", $responseText));
        return str_replace("errors:", "\n", $responseText);
    }

    /**
     * @throws Exception
     */
    public function validateResponse(string $responseText): void
    {
        if (strpos($responseText, 'errors') !== false) {
            throw new Exception($this->prepareErrors($responseText));
        }
    }
}
