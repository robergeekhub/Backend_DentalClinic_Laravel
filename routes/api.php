<?php

use App\Http\Controllers\AppointmentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\UserController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('register',[UserController::class,'store']);
Route::post('login',[UserController::class,'login'])->name('login');



Route::get('clientsWithAppointments',[ClientController::class,'indexAll']);
Route::apiResource('clients', ClientController::class);
Route::get('appointments',[AppointmentController::class,'indexAll']);
Route::apiResource('client.appointments', AppointmentController::class);