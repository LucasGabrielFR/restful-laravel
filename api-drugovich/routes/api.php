<?php

use Illuminate\Http\Request;
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

Route::apiResource('/managers', \App\Http\Controllers\Api\ManagerController::class);
Route::apiResource('/groups', \App\Http\Controllers\Api\GroupController::class)->middleware('jwt.auth');
Route::apiResource('/clients', \App\Http\Controllers\Api\ClientController::class);

Route::post('/clients/{client}/updateClientGroup', \App\Http\Controllers\Api\ClientController::class.'@updateClientGroup')->middleware('jwt.auth');

Route::post('/login', \App\Http\Controllers\Api\AuthController::class.'@login');
