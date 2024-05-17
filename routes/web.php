<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TestController;

// web.phpだが、切り分けが面倒なためAPIも混在させている
Route::get('/', function () {
    return view('welcome');
});

// API群
Route::get('v1/test', [TestController::class, 'getTestCode']);

