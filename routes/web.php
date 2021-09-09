<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocumentController as DC;
use App\Http\Controllers\AdminController as AC;
use App\Http\Controllers\PendaftaranController as PC;

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
    return redirect('login');
});

Route::group(['middleware' => 'is_admin'], function(){
    Route::get('/admin', [DC::class, 'index'])->name('admin.document');

    Route::post('/admin/terima/{id}',[AC::class, 'terima'])->name('admin.terima');
    Route::patch('/admin/verifiksi/{id}',[AC::class, 'verifikasi'])->name('admin.verifikasi');
    Route::patch('/admin/tolak/{id}',[AC::class, 'tolak'])->name('admin.tolak');
    Route::patch('/admin/batal/{id}',[AC::class, 'batal'])->name('admin.batal');
    Route::get('/admin/show/{id}', [AC::class, 'show'])->name('admin.show');
    Route::get('/admin/wawancara/{id}', [AC::class, 'wawancara'])->name('admin.wawancara');
    Route::post('/admin/wawancara/store', [AC::class, 'store'])->name('admin.wawancara.store');

    Route::get('/admin/peserta/diterima', [PC::class, 'diterima'])->name('peserta.diterima');
    Route::get('/admin/peserta/ditolak', [PC::class, 'ditolak'])->name('peserta.ditolak');
    Route::get('/admin/peserta/diverifikasi', [PC::class, 'diverifikasi'])->name('peserta.diverifikasi');

});

Route::group(['middleware' => 'auth'], function(){
    Route::get('/user/document', [DC::class, 'show'])->name('user.document');
    Route::get('/user/create', [DC::class, 'create'])->name('user.create');
    Route::post('/user/store', [DC::class, 'store'])->name('user.store');
    Route::delete('/user/delete/{id}', [DC::class, 'destroy'])->name('user.delete');
    Route::get('user/edit/{id}',[DC::class, 'edit'])->name('user.edit');
    Route::patch('user/update/{id}', [DC::class, 'update'])->name('user.update');
    Route::get('user/informasi/{id}', [DC::class, 'informasi'])->name('user.informasi');

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
