<?php

namespace igormakarov\AlphaSms;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use igormakarov\AlphaSms\Message\IMessage;

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
        $this->validateResponse($response);
        return (float)$response['balance'];
    }

    /**
     * @throws GuzzleException
     * @throws Exception
     */
    public function getMessageStatus(int $id)
    {
        $response = $this->sendRequest($this->routes->messageStatus($id));
        $this->validateResponse($response);
        return $response;
    }

    /**
     * @throws GuzzleException
     * @throws Exception
     */
    public function getSmsPriceByNumber(string $phone)
    {
        if (empty($phone)) {
            throw new Exception("Phone number is empty!");
        }
        $response = $this->sendRequest($this->routes->smsPriceByNumber($phone));
        $this->validateResponse($response);
        return $response;
    }

    /**
     * @throws GuzzleException
     * @throws Exception
     */
    public function send(IMessage $message): int
    {
        $response = $this->sendRequest($this->routes->sendMessage($message));
        $this->validateResponse($response);
        return (int)$response['id'];
    }

    /**
     * @throws GuzzleException
     */
    protected function sendRequest(string $url, array $params = []): array
    {
        $response = $this->httpClient->request("GET", $url, $params);
        $content = $response->getBody()->getContents();
        return $this->textResponseToArray($content);
    }

    public function textResponseToArray($responseText): array
    {
        $clearData = [];
        $explodedArray = explode(",", rtrim(str_replace("\n", ',', $responseText), ','));
        foreach ($explodedArray as $array) {
            $val = explode(':', $array);
            $clearData[$val[0]] = $val[1];
        }
        return $clearData;
    }

    /**
     * @throws Exception
     */
    public function validateResponse(array $response): void
    {
        if (isset($response['errors'])) {
            throw new Exception($response['errors']);
        }
    }
}
