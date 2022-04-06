<?php

use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\UserProfileController;
use App\Http\Controllers\API\Auth\RegisterController;
use App\Http\Controllers\API\Auth\LoginController;
use App\Http\Controllers\AuthController;
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
Route::post('/registerUser',[RegisterController::class,'registerUser']);

Route::get('/show_profile',[UserProfileController::class,'show_profile'])->middleware('auth:sanctum');
Route::put('/update_profile',[UserProfileController::class,'update_profile'])->middleware('auth:sanctum');

Route::post('/login',[LoginController::class,'login']);
Route::get('/get_category', [CategoryController::class,'get_category']);
Route::post('/upload_image', [CategoryController::class,'upload_image']);
Route::get('/get_sub_category', [CategoryController::class,'get_sub_category']);
Route::get('/show_products/{category}', [ProductController::class,'show_products']);
Route::get('/show_all_products', [ProductController::class,'show_all_products']);


