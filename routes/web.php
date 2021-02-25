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

Route::get('/', function () {
    return view('welcome');
})->middleware('auth');

Auth::routes();
Route::get('/faturamento', [App\Http\Controllers\HomeController::class, 'faturamento'])->middleware('auth');
Route::get('/caixa', [App\Http\Controllers\HomeController::class, 'caixa'])->middleware('auth');
Route::get('/intro', [App\Http\Controllers\HomeController::class, 'intro'])->middleware('auth');
Route::get('/estoque', [App\Http\Controllers\HomeController::class, 'index'])->name('estoque')->middleware('auth');

Auth::routes();

Route::get('/estoque', [App\Http\Controllers\HomeController::class, 'index'])->name('estoque')->middleware('auth');
Route::get('/requisicao', [App\Http\Controllers\HomeController::class, 'requisicao'])->name('requisicao')->middleware('auth');
//Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('estoque')->middleware('auth');
Route::get('/send-email', [App\Http\Controllers\MailController::class, 'sendEmail']);
/*
Route::get('/home', function() {
    return view('home');
})->name('home');//->middleware('auth'); */
