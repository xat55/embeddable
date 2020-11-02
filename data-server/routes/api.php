<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Services\JsonRpcServer;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/**
 * Все запросы поступившие на сервер по адресу <server_base_uri>/data
 * будут обработаны классом JsonRpcServer
 */
Route::post('/data', function (Request $request, JsonRpcServer $server) {
    return $server->handle($request);
});
