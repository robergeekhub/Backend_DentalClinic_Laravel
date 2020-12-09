<?php

use App\Http\Controllers\AppointmentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
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

Route::group(['middleware' => ['cors']], function () {

Route::post('register',[UserController::class,'store']); 
Route::post('login',[UserController::class,'login'])->name('login'); 
Route::get('logout',[UserController::class,'logout'])->name('logout')->middleware('auth:api'); 

Route::get('usersWithAppointments',[UserController::class,'indexAll']);
Route::apiResource('users', UserController::class)->middleware('auth:api');

Route::get('appointments',[AppointmentController::class,'indexAll']); 
Route::post('appointment/create', [AppointmentController::class,'store'])->name('create')->middleware('auth:api'); 
Route::delete('appointment/cancel/{id}', [AppointmentController::class,'destroy'])->middleware('auth:api');

Route::apiResource('user.appointments', AppointmentController::class); 
});