<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

// web.phpだが、切り分けが面倒なためAPIも混在させている
Route::get('callback', [AuthController::class, 'handleCallback']);

// API群
Route::get('v1/test', [TestController::class, 'getTestCode']);

Route::get('v1/user/users', [UserController::class, 'getUsers']);
Route::get('v1/user/{id}', [UserController::class, 'getUserId']);

