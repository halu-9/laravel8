<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', function () {
    return view('home');
});

// /registerにgetリクエストしたときは、ゲストモードの場合だとcreateメソッドを呼ぶ。
Route::get('/register', [RegisterController::class, 'create'])
    ->middleware('guest') // 未ログインしか通れない
    ->name('register');
Route::post('/register', [RegisterController::class, 'store'])
    ->middleware('guest');

Route::get('/login', [LoginController::class, 'index'])
    ->middleware('guest')
    ->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])
    ->middleware('guest');

Route::get('/logout', [LoginController::class, 'logout'])
    ->middleware('auth') // ログインしている人しか通れない
    ->name('logout');
