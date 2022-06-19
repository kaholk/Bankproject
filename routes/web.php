<?php

use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('home');
});


Route::get('/login',[UserController::class, 'login']);
Route::get('/register/{step?}',[UserController::class, 'register']);
Route::get('/dashboard',[UserController::class, 'dashboard']);
Route::get('/logout',[UserController::class, 'logout']);
Route::get('/user_delete/{user_id}',[UserController::class, 'delete']);
Route::get('/user_edit/{user_id}',[UserController::class, 'edit']);


Route::post('/register_post/{step?}',[UserController::class, 'register_post']);
Route::post('/login_post',[UserController::class, 'login_post']);



Route::get('/new_transaction',[TransactionController::class, 'new_transaction']);
Route::get('/transaction_finish',[TransactionController::class, 'transaction_finish']);

Route::post('/new_transaction_post',[TransactionController::class, 'new_transaction_post']);
