<?php

namespace App\Http\Response;


use App\Services\JsonRpcServer;

/**
 * Класс JsonRpcResponse возвращает ответ,
 * сформированный  в формате, согласно спецификации JSON-RPC 2.0
 */
class JsonRpcResponse
{
    public static function success($result, string $id = null)
    {
        return [
            'jsonrpc' => JsonRpcServer::JSON_RPC_VERSION,
            'result'  => $result,
            'id'      => $id,
        ];
    }

    public static function error($error, string $id = null)
    {
        return [
            'jsonrpc' => JsonRpcServer::JSON_RPC_VERSION,
            'error'  => $error,
            'id'      => null,
        ];
    }
}
