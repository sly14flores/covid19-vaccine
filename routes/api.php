<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\SurveyController;
use App\Http\Controllers\Api\NapanamController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\DOHDataSelections;
use App\Http\Controllers\Api\RegistrationController;

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
 * Authentication
 */
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout']);

/**
 * Surveys
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

/**
 * Users
 */
Route::apiResources([
    'users' => UserController::class,
],[
    'only' => ['index']
]);
Route::apiResources([
    'user' => UserController::class,
],[
    'except' => ['index']
]);

Route::prefix('napanam')->group(function() {

    Route::get('check/registration/{id}', [NapanamController::class, 'checkRegistration']);
    Route::get('check/registration/{id}/{birthday}', [NapanamController::class, 'verifyNapanamQR']);

});

/**
 * DOH Registration
 */

Route::prefix('doh')->group(function() {

    /**
     * Selections
     */
    Route::get('selections', DOHDataSelections::class);

    /**
     * Registration
     */
    Route::apiResources([
        'registrations' => RegistrationController::class,
    ],[
        'only' => ['index']
    ]);
    Route::apiResources([
        'registration' => RegistrationController::class,
    ],[
        'except' => ['index']
    ]);

});
