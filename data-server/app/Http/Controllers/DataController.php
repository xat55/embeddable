<?php

namespace App\Http\Controllers;


use App\Models\Data;
use App\Services\DataCreate;

/**
 * Контроллер для работы с БД
 */
class DataController extends Controller
{
    /**
     * Получаем даные объекта модели Data из БД по параметру 'page_uid'
     */
    public function getPageById(array $params)
    {
        $data = Data::where('page_uid', $params['page_uid'])->first();

        return $data;
    }

    /**
     * Создаем новую запись в БД и возвращаем ее данные (объект модели Data из БД)
     */
    public function create(array $params)
    {
        $data = DataCreate::create($params);

        return $data;
    }
}
