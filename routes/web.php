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
//add item page
Route::get('/addItemProduct',[StoreController::class,'addItemProduct']);
Route::post('/addItemProduct',[StoreController::class,'DoaddItemProduct']);
//store page 
    Route::get('/showStore',[StoreController::class,'ShowStoreTable']);
    //remove
    Route::post('/remove',[StoreController::class,'Remove'])->name('remove');
//edit page 
Route::get('/edit/{id}',[StoreController::class,'edit']);
Route::post('/edit/{id}',[StoreController::class,'DoEdit']);
//details page 
Route::get('/detail/{id}',[StoreController::class,'Detail']);
Route::post('/addtobox',[StoreController::class,'addToBox'])->name('add_to_box');
