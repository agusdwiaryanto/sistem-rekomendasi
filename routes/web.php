<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\WisataController;
use App\Http\Controllers\RekomendasiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DetailwisataController;


Route::get('/', function () {
    return view('rekomendasi/rekomendasi');
});
Route::post('/kirimData', [RekomendasiController::class, 'kirimData']);
Route::post('/get-rekomendasi', [RekomendasiController::class, 'getRekomendasi']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/admin', [DashboardController::class, 'indexPage'])->name('dashboard.index');
    Route::get('/admin/dashboard', [DashboardController::class, 'indexPage'])->name('dashboard.index');
    Route::get('/admin/about', [AboutController::class, 'indexPage'])->name('about.index');
    Route::get('/admin/wisata', [WisataController::class, 'indexPage'])->name('wisata.index');
    Route::get('/admin/wisata/tambah', [WisataController::class, 'tambah'])->name('wisata.tambah');
    Route::post('/admin/wisata/submit', [WisataController::class, 'submit'])->name('wisata.submit');
    Route::get('/admin/wisata/edit/{id}', [WisataController::class, 'edit'])->name('wisata.edit');
    Route::post('/admin/wisata/update/{id}', [WisataController::class, 'update'])->name('wisata.update');
    Route::post('/admin/wisata/delete/{id}', [WisataController::class, 'delete'])->name('wisata.delete');

    Route::get('/admin/detailwisata', [DetailwisataController::class, 'indexPage'])->name('detailwisata.index');
    Route::get('/detailwisata/update-all', [DetailwisataController::class, 'updateAll'])->name('detailwisata.updateAll');

    // Route::get('/admin/detailwisata/tambah', [WisataController::class, 'tambah'])->name('wisata.tambah');
    // Route::post('/admin/detailwisata/submit', [WisataController::class, 'submit'])->name('wisata.submit');
    // Route::get('/admin/detailwisata/edit/{id}', [WisataController::class, 'edit'])->name('wisata.edit');
    // Route::post('/admin/detailwisata/update/{id}', [WisataController::class, 'update'])->name('wisata.update');
    // Route::post('/admin/detailwisata/delete/{id}', [WisataController::class, 'delete'])->name('wisata.delete');
});

// Pastikan route logout menggunakan POST
Route::post('logout', function () {
    Auth::logout();
    return redirect('/');  // Arahkan ke halaman yang diinginkan setelah logout
})->name('logout');