<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoreController;

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

Route::get('/',[StoreController::class,'index']);
Route::get('/addItemProduct',[StoreController::class,'addItemProduct']);
Route::post('/addItemProduct',[StoreController::class,'DoaddItemProduct']);
Route::get('/showStore',[StoreController::class,'ShowStoreTable']);
Route::get('/edit/{id}',[StoreController::class,'edit']);
Route::post('/edit/{id}',[StoreController::class,'DoEdit']);
Route::post('/remove',[StoreController::class,'Remove'])->name('remove');