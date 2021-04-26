<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\SurveyController;
use App\Http\Controllers\Api\NapanamController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\HospitalController;
use App\Http\Controllers\Api\DOHDataSelections;
use App\Http\Controllers\Api\GeneralDataSelections;
use App\Http\Controllers\Api\RegistrationController;
use App\Http\Controllers\Api\VaccineController;
use App\Http\Controllers\Api\DosageController;
use App\Http\Controllers\Api\PreAssessmentController;
use App\Http\Controllers\Api\PostAssessmentController;
use App\Http\Controllers\Api\RegistrationImportController;
use App\Http\Controllers\Api\SurveysSummary;
use App\Http\Controllers\Api\ChangePassword;
use App\Http\Controllers\Api\DefaultVaccinator;

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
Route::post('authenticate', [LoginController::class, 'authenticate']);

/**
 * Change password
 */
Route::post('change/password', ChangePassword::class);

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

/**
 * Hospitals
 */
Route::apiResources([
    'hospitals' => HospitalController::class,
],[
    'only' => ['index']
]);
Route::apiResources([
    'hospital' => HospitalController::class,
],[
    'except' => ['index']
]);

Route::prefix('napanam')->group(function() {

    Route::get('check/registration/{id}', [NapanamController::class, 'checkRegistration']);
    Route::get('check/registration/{id}/{birthday}', [NapanamController::class, 'verifyNapanamQR']);
    Route::get('check/registrationID/{id}', [NapanamController::class, 'getNapanamIDNO']);

});

/**
 * DOH Registration
 */

Route::prefix('doh')->group(function() {

    /**
     * Selections
     */
    Route::get('selections', DOHDataSelections::class);
    Route::get('selections/addresses', [DOHDataSelections::class, 'addresses']);
    Route::get('selections/brands', [DOHDataSelections::class, 'brands']);
    Route::get('selections/vaccination/sessions', [DOHDataSelections::class, 'vaccinationSession']);
    Route::get('selections/groups', [DOHDataSelections::class, 'groups']);

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

    /**
     * Vaccines
     */
    Route::apiResources([
        'vaccines' => VaccineController::class,
        'dosages/{id}' => DosageController::class,
    ],[
        'only' => ['index']
    ]);
    Route::apiResources([
        'vaccine' => VaccineController::class,
        'dosage' => DosageController::class,
    ],[
        'except' => ['index']
    ]);
    Route::get('vaccines/qr/{id}', [VaccineController::class, 'qrRegistration']);
    Route::put('vaccines/update/registration/{id}', [VaccineController::class, 'updateRegistration']);
    Route::get('vaccines/default/vaccinator', DefaultVaccinator::class);
    Route::get('selections/vaccine/refusals', [DOHDataSelections::class, 'refusalValue']);   
    Route::get('selections/vaccine/deferrals', [DOHDataSelections::class, 'deferalValue']);

    /**
     * Pre Assessments
     */
    Route::apiResources([
        'pres/{id}' => PreAssessmentController::class,
    ],[
        'only' => ['index']
    ]);
    Route::apiResources([
        'pre' => PreAssessmentController::class,
    ],[
        'except' => ['index']
    ]);
    Route::get('structure/assessments/pre',[PreAssessmentController::class,'structure']);

    /**
     * Post Assessments
     */
    Route::apiResources([
        'posts/{id}' => PostAssessmentController::class,
    ],[
        'only' => ['index']
    ]);
    Route::apiResources([
        'post' => PostAssessmentController::class,
    ],[
        'except' => ['index']
    ]);
    Route::get('structure/assessments/post',[PostAssessmentController::class,'structure']);  

    /**
     * Upload excel for import
     */
    Route::post('upload/excel', [RegistrationImportController::class, 'upload']);
    Route::post('excel/data/structure', [RegistrationImportController::class, 'check']);
    Route::post('excel/data/import', [RegistrationImportController::class, 'import']);

});

/**
 * General data selections
 */
Route::prefix('general')->group(function() {

    Route::prefix('selections')->group(function() {
        
        /**
         * Hospitals
         */
        Route::get('hospitals', [GeneralDataSelections::class, 'hospitals']);

        /**
         * Groups
         */
        Route::get('groups', [GeneralDataSelections::class, 'groups']);

        /**
         * Users
         */
        Route::get('users', [GeneralDataSelections::class, 'users']);

        /**
         * Users
         */
        Route::get('vaccinators', [GeneralDataSelections::class, 'vaccinators']);        


    });

});

/**
 * Summary
 */
Route::prefix('summary')->group(function() {

    Route::get('surveys', [SurveysSummary::class, 'getSummary']);

});