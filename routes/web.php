<?php

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
/*
Route::get('/', function () {
    return view('welcome');
});
*/
Auth::routes();
Route::get('/faturamento', [App\Http\Controllers\HomeController::class, 'faturamento']);
Route::get('/caixa', [App\Http\Controllers\HomeController::class, 'caixa']);
Route::get('/intro', [App\Http\Controllers\HomeController::class, 'intro']);
Route::get('/estoque', [App\Http\Controllers\HomeController::class, 'index'])->name('estoque');

Auth::routes();

Route::get('/estoque', [App\Http\Controllers\HomeController::class, 'index'])->name('estoque');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('estoque');
Route::get('/send-email', [App\Http\Controllers\MailController::class, 'sendEmail']);
/*
Route::get('/home', function() {
    return view('home');
})->name('home');//->middleware('auth'); */
