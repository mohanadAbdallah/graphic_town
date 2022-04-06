<?php

use App\Http\Controllers\Admin\AddsController;
use App\Http\Controllers\Admin\AgentController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SubcategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\sessionController;
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
Route::get('/',function(){
    return view('home');
})->middleware('auth');


Auth::routes();

Route::get('/admin', [HomeController::class, 'index'])->name('home');

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::resource('/admin/categories', CategoryController::class);
Route::resource('/admin/adds', AddsController::class);

Route::resource('/admin/users', UserController::class)->middleware('role:admin');

Route::get('/admin/category/{id}/subcategories/create', [SubcategoryController::class, 'create'])->name('subcategory.create');
Route::get('/admin/category/{id}/subcategories/index', [SubcategoryController::class, 'index'])->name('subcategory.index');
Route::get('/admin/category/{id}/subcategories/edit', [SubcategoryController::class, 'edit'])->name('subcategory.edit');
Route::post('/admin/category/subcategories', [SubcategoryController::class, 'store'])->name('subcategory.store');
Route::put ('/admin/category/subcategories', [SubcategoryController::class, 'update'])->name('subcategory.update');
Route::DELETE('/admin/category/subcategories/{id}', [SubcategoryController::class, 'destroy'])->name('subcategory.destroy');
Route::resource('/admin/products', ProductController::class);
Route::get('/admin/subcategories/{id}', [ProductController::class,'loadsubcategories'])->name('loadsubcategories');
Route::get('/admin/subcategories/{id}', [CategoryController::class,'subcategories']);
//Route::post('/admin/categories/active/{id}', [CategoryController::class,'active'])->name('active_cat');

Route::post('/update-category/{id}',[CategoryController::class,'update']);
Route::post('/update-product/{id}',[ProductController::class,'update']);
Route::get('/fetch-category',[CategoryController::class,'fetchCategory']);
Route::get('/fetch-products',[ProductController::class,'fetchProduct']);
Route::get('/fetch-Adds',[AddsController::class,'fetchAdds']);




