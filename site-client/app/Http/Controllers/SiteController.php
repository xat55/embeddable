<?php

namespace App\Http\Controllers;


use App\Services\JsonRpcClient;
use App\Services\SessionClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

/**
 * Контроллер формирует запрос с нужными параметрами и обрабатывает ответ.
 */
class SiteController extends Controller
{
    protected $client;
    protected $session;

    public function __construct(JsonRpcClient $client, SessionClient $session)
    {
        $this->client = $client;
        $this->session = $session;
    }

    /**
     * Формируем запрос с нужными параметрами к серверу
     * (обращаемся к DataController к действию getPageById())
     */
    public function show(Request $request)
    {
        $data = $this->client->send('getPageById', ['page_uid' => $request->get('page_uid')]);

        if (empty($data['result'])) {
            abort(404);
        }

        $this->getMethodSession($data);

        return view('page', ['data' => $data['result']]);
    }

    /**
     * Формируем запрос с нужными параметрами к серверу
     * (обращаемся к DataController к действию create())
     * и получаем json объект
     */
    public function store(Request $request)
    {
        $data = $this->client->send('create', $request->all());

        if (isset($data['error'])) {
            return Redirect::back()->withErrors($data['error']);
        }

        $this->getMethodSession($data);

        return view('page', ['data' => $data['result'], 'request' => $request->except('_token'), ]);
    }

    /**
     * Вызывает действие setSession() класса SessionClient, которое устанавливает
     * в сессию значения массива $data['result']
     */
    private function getMethodSession($data)
    {
        return $this->session->setSession($data);
    }
}
