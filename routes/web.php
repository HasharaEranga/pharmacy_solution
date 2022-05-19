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

Route::get('/', function () {
    return redirect("/home");
});

Auth::routes();



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

 // /prescription
Route::get('/prescription', [App\Http\Controllers\HomeController::class, 'prescriptionAll']);
Route::get('/prescription-add', [App\Http\Controllers\HomeController::class, 'prescriptionAdd']);
Route::post('/prescription-add', [App\Http\Controllers\HomeController::class, 'prescriptionAddSubmit']);

// /quotation
Route::get('/quotation-add/{id}', [App\Http\Controllers\HomeController::class, 'quotationAdd']);
Route::post('/quotation-send', [App\Http\Controllers\HomeController::class, 'quotationSend']);
Route::get('/quotation', [App\Http\Controllers\HomeController::class, 'quotationAll']);
Route::get('/quotation-view/{id}', [App\Http\Controllers\HomeController::class, 'quotationView']);
Route::get('/quotation-approved/{id}', [App\Http\Controllers\HomeController::class, 'quotationApproved']);
Route::get('/quotation-reject/{id}', [App\Http\Controllers\HomeController::class, 'quotationReject']);