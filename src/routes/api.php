<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [UserController::class, 'login']);

Route::group([
    'prefix' => 'dashboard',
    'middleware' => 'auth:sanctum',
], function (){
    Route::get('/users', [UserController::class, 'index']);

    Route::get('/companies', [CompanyController::class, 'index']);
    Route::post('/companies', [CompanyController::class, 'store']);
    Route::get('/company/{id}', [CompanyController::class, 'show']);
    Route::put('/company/{id}', [CompanyController::class, 'update']);
    Route::delete('/company/{id}', [CompanyController::class, 'destroy']);
    
    Route::get('/participants', [ParticipantController::class, 'index']);
    Route::post('/participants', [ParticipantController::class, 'store']);
    Route::get('/participant/{id}', [ParticipantController::class, 'show']);
    Route::put('/participant/{id}', [ParticipantController::class, 'update']);
    Route::delete('/participant/{id}', [ParticipantController::class, 'destroy']);


});