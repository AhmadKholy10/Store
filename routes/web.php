<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\AdminController;


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

//Route::get('/',function(){return view('welcome'); });
//Auth::routes();

//Route::get('/',[StoreController::class,'index']);
//add item page

Route::get('/', function(){
    return view('welcome');
});
Route::get('/home', [StoreController::class, 'index'])->name('home');

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

//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();
Route::prefix('user')->name('user.')->group(function(){
    Route::middleware(['guest', 'PreventBackHistory'])->group(function(){
        Route::view('/login','dashboard.user.login')->name('login');
        Route::view('/register','dashboard.user.register')->name('register');
        Route::post('/create',[UserController::class,'create'])->name('create');
        Route::post('/check',[UserController::class,'check'])->name('check');
    });
    
    Route::middleware(['auth', 'PreventBackHistory'])->group(function(){
        Route::view('/home', 'indexStore')->name('home');
        Route::post('/logout',[UserController::class,'logout'])->name('logout');
    });
});

Route::prefix('admin')->name('admin.')->group(function(){
       
    Route::middleware(['guest:admin','PreventBackHistory'])->group(function(){
          Route::view('/login','dashboard.admin.login')->name('login');
          Route::post('/check',[AdminController::class,'check'])->name('check');
    });

    Route::middleware(['auth:admin','PreventBackHistory'])->group(function(){
        Route::get('/home',[StoreController::class,'index'])->name('home');
        Route::post('/logout',[AdminController::class,'logout'])->name('logout');
    });

});


