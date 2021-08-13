<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ExportSurveys;
use App\Http\Controllers\ExportRegistrations;
use App\Http\Controllers\VasReportcontroller;

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

Route::get('/', function () {
    return view('landing-page');
});

Route::get('/survey', function () {
    return view('app');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/admin', function () {
    return view('home');
});

Route::get('/registration', function () {
    return view('registration');
});

Route::get('/profile', function () {
    return view('profile');
});

Route::get('/home/reports/surveys', ExportSurveys::class);
Route::get('/home/reports/registrations', ExportRegistrations::class);
Route::get('/home/reports/vas', VasReportcontroller::class);

Route::get('/survey/{id}', function($id) {
	
	return view('survey');
	
});

