<?php

use App\Http\Controllers\SupplierActivityController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::controller(UserController::class)->group(function (){
    Route::post('user/register','userRegister')->name('register');
    Route::post('user/login','userLogin')->name('login');
});


 Route::middleware('auth:sanctum')->group(function (){
    Route::post('user/logout',[UserController::class,'userLogout'])->name('logout');
    Route::apiResource('suppliers',SupplierController::class);
 });
 Route::apiResource('activities',SupplierActivityController::class);


