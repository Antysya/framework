<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Cookie;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assinged to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    return view('welcome');
})->name('main');

Route::get('/registration', [App\Http\Controllers\SingUp::class, 'form'])
  ->name('registration.form');

Route::post('/registration', [App\Http\Controllers\SingUp::class, 'post'])
    ->name('registration.post');

Route::get('/login', [App\Http\Controllers\SingIn::class, 'form'])
  ->name('sing_in.form');

Route::post('/login', [App\Http\Controllers\SingIn::class, 'post'])
    ->name('sing_in.post');

Route::get('/logout', [App\Http\Controllers\SingIn::class, 'logout'])
    ->name('sing_in.logout');

Route::get('/reset_password', [App\Http\Controllers\ResetPasswordController::class, 'showResetForm'])
    ->name('reset.password');

Route::get('/landing', [App\Http\Controllers\Landing:: class, 'index']);
//Route::get('/age', [App\Http\Controllers\Landing:: class, 'json']);

Route::get('/landing_hw', [App\Http\Controllers\Landing_hw:: class, 'index']);

Route::get('/questions', [App\Http\Controllers\Questions::class, 'get'])->name('question.get');

Route::post('/questions', [App\Http\Controllers\Questions::class, 'post'])->name('question.post');

Route::get('/questions/list', [App\Http\Controllers\Questions::class, 'listAll'])->name('question.list');

Route::get('/image', [App\Http\Controllers\Image::class, 'create'])
    ->name('image');

Route::get('/graph', [App\Http\Controllers\Image::class, 'graph'])
    ->name('image.graph');
