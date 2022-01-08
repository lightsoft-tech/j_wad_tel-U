<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\KebijakanPrivasiController;
use App\Http\Controllers\MenuController;

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
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/* faq */
Route::get('/back-faq', [FaqController::class, 'index'])->name('faq');
Route::post('/back-faq/add', [FaqController::class, 'store']);
Route::post('/back-faq/{faq}/edit', [FaqController::class, 'edit']);
Route::put('/back-faq/update/{faq}', [FaqController::class, 'update']);
Route::delete('/back-faq/{faq}/drop', [FaqController::class, 'destroy']);

/* kebijakan privasi */
Route::get('/back-kebijakan-privasi', [KebijakanPrivasiController::class, 'index'])->name('kebijakan-privasi');
Route::put('/back-kebijakan-privasi/update/{kebijakanPrivasi}', [KebijakanPrivasiController::class, 'update']);

/* menu */
Route::get('/back-menu', [MenuController::class, 'index'])->name('menu');
Route::post('/back-menu/add', [MenuController::class, 'store']);
Route::post('/back-menu/{menu}/edit', [MenuController::class, 'edit']);
Route::put('/back-menu/update/{menu}', [MenuController::class, 'update']);
Route::delete('/back-menu/{menu}/drop', [MenuController::class, 'destroy']);