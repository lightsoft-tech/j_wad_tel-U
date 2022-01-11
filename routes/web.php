<?php

use App\Models\Menu;
use App\Models\Berita;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\KebijakanPrivasiController;
use App\Http\Controllers\KeranjangController;
use App\Models\Faq;

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
    return redirect('/login');
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

/* berita */
Route::get('/back-berita', [BeritaController::class, 'index'])->name('berita');
Route::post('/back-berita/add', [BeritaController::class, 'store']);
Route::post('/back-berita/{berita}/edit', [BeritaController::class, 'edit']);
Route::put('/back-berita/update/{berita}', [BeritaController::class, 'update']);
Route::delete('/back-berita/{berita}/drop', [BeritaController::class, 'destroy']);

// FRONTEND

Route::group(['middleware' => ['auth', 'role:customer']], function () {
    Route::get('/home-frontend', function () {
        $berita = Berita::latest()->get();
        return view('frontend.home', compact('berita'));
    })->name('home-frontend');

    Route::get('/profile', function () {
        return view('frontend.profile');
    })->name('profile');

    Route::get('/faq', function () {
        $faq = Faq::latest()->get();
        return view('frontend.faq', compact('faq'));
    })->name('faq');

    Route::get('/keranjang', function () {
        return view('frontend.keranjang');
    })->name('keranjang');
    Route::post('/keranjang/add/{menu}', [KeranjangController::class, 'store']);

    Route::get('/pemesanan', function () {
        $menu = Menu::latest()->get();
        return view('frontend.pemesanan', compact('menu'));
    })->name('pemesanan');

    Route::get('/keuangan', function () {
        return view('frontend.keuangan');
    })->name('keuangan');

    Route::put('/update-profile', [UserController::class, 'update']);
});
