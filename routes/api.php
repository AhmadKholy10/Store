<?php

use App\Http\Controllers\NotesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/notes',[NotesController::class, 'index']);
Route::get('/notes/{id}',[NotesController::class, 'show']);
Route::post('/notes/store',[NotesController::class, 'store']);
Route::post('/notes/update/{id}',[NotesController::class, 'update']);
Route::post('/notes/delete/{id}',[NotesController::class, 'destroy']);
