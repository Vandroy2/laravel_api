<?php

use App\Http\Controllers\Api\V1\CardController;
use App\Http\Controllers\Api\V1\CountryController;
use App\Http\Controllers\Api\V1\DeskController;
use App\Http\Controllers\Api\V1\ListController;
use App\Http\Controllers\Api\V1\TaskController;
use Illuminate\Support\Facades\Route;

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


//-------Маршруты для демонстрации работы трейтов--

Route::get('/desks/filter/{id}', [DeskController::class, 'filter']);

Route::get('/lists/filter/{id}', [listController::class, 'filter']);

//-------Маршруты для контроллеров (CRUD, валидация и т.д----------------------------

Route::apiResources([
    'desks'=>DeskController::class,
    'lists'=>ListController::class,
    'cards'=>CardController::class,
    'tasks'=>TaskController::class,
]);
//--------Маршрут для получения полей из api https://datausa.io/about/api/
Route::get('/data', [CountryController::class, 'getDataFields']);





