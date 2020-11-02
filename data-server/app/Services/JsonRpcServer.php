<?php

namespace App\Services;


use App\Exceptions\JsonRpcException;
use App\Http\Controllers\DataController;
use App\Http\Response\JsonRpcResponse;
use Illuminate\Http\Request;

/**
 * Все запросы поступившие на сервер по адресу <server_base_uri>/data
 * будут обработаны классом JsonRpcServer.
 * Класс JsonRpcServer связывает нужный метод контроллера с переданными параметрами
 * и возвращает ответ сформированный классом JsonRpcResponse в формате
 * согласно спецификации JSON-RPC 2.0
 */
class JsonRpcServer
{
    const JSON_RPC_VERSION = '2.0';

    protected $controller;

    public function __construct()
    {
        $this->controller = resolve(DataController::class);
    }

    public function handle(Request $request)
    {
        try {
            $content = json_decode($request->getContent(), true);

            if (empty($content)) {
                throw new JsonRpcException('Parse error', JsonRpcException::PARSE_ERROR);
            }

            $result = $this->controller->{$content['method']}(...[$content['params']]);

            return JsonRpcResponse::success($result, $content['id']);

        } catch (\Exception $e) {
            return JsonRpcResponse::error($e->getMessage());
        }
    }
}
