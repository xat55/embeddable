<?php

namespace App\Services;


use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

/**
 * Класс создает и возвращает ответ согласно спецификации JSON-RPC 2.0
 */
class JsonRpcClient
{
    const JSON_RPC_VERSION = '2.0';

    const METHOD_URI = 'data';

    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'headers' => ['Content-Type' => 'application/json'],
            'base_uri' => config('services.data.base_uri_api')
        ]);
    }

    /**
     * Действие обрабатывает полученный массив объекта $request
     * и возвращает ответ в виде json массива в формате JSON-RPC 2.0
     */
    public function send(string $method, array $params): array
    {
        $response = $this->client
            ->post(self::METHOD_URI, [
                RequestOptions::JSON => [
                    'jsonrpc' => self::JSON_RPC_VERSION,
                    'id' => time(),
                    'method' => $method,
                    'params' => $params,
                ]
            ])->getBody()->getContents();

        return json_decode($response, true);
    }
}
