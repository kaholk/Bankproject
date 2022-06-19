<?php

use App\Http\Controllers\AccountController;
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
Route::get('/add_user',[UserController::class, 'add_user']);
Route::post('/add_user_post',[UserController::class, 'add_user_post']);

Route::get('/account_delete/{account_id}',[AccountController::class, 'delete']);
Route::get('/account_edit/{account_id}',[AccountController::class, 'edit']);
Route::get('/add_account',[AccountController::class, 'add_account']);
Route::post('/account_edit_post/{account_id}',[AccountController::class, 'edit_post']);

Route::post('/register_post/{step?}',[UserController::class, 'register_post']);
Route::post('/login_post',[UserController::class, 'login_post']);
Route::post('/edit_user_post/{user_id}',[UserController::class, 'edit_user_post']);



Route::get('/new_transaction',[TransactionController::class, 'new_transaction']);
Route::get('/transaction_finish',[TransactionController::class, 'transaction_finish']);

Route::post('/new_transaction_post',[TransactionController::class, 'new_transaction_post']);
