<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SurveyController;
use App\Http\Controllers\NapanamController;

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

Route::apiResources([
    'surveys' => SurveyController::class,
],[
    'only' => ['index']
]);

Route::apiResources([
    'survey' => SurveyController::class,
],[
    'except' => ['index']
]);

Route::get('napanam/check/registration/{id}', [NapanamController::class, 'checkRegistration']);