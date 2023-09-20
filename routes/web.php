<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/registration', [App\Http\Controllers\SingUp::class,'form'])->name('registration.form');

Route::post('/registration', [App\Http\Controllers\SingUp::class,'form'])->name('registration.form');
Route::get('/', function () {
    return view('welcome');
});

Route::get('/landing', [App\Http\Controllers\Landing:: class, 'index']);
//Route::get('/age', [App\Http\Controllers\Landing:: class, 'json']);

Route::get('/landing_hw', [App\Http\Controllers\Landing_hw:: class, 'index']);

Route::get('/questions', [App\Http\Controllers\Questions::class, 'get'])->name('question.get');

Route::post('/questions', [App\Http\Controllers\Questions::class, 'post'])->name('question.post');

Route::get('/questions/list', [App\Http\Controllers\Questions::class, 'listAll'])->name('question.list');
