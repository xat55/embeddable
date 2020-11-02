<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Вызываем представление формы */
Route::get('/', function ()
{
    return view('uid-form');
});

/* Вызываем представление создания формы */
Route::get('/create', function ()
{
    return view('create-form');
});

use App\Http\Controllers\SiteController;
Route::post('/show', [SiteController::class, 'show']);
Route::post('/store', [SiteController::class, 'store']);
