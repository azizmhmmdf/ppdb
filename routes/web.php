<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocumentController as DC;
use App\Http\Controllers\AdminController as AC;

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
    Route::get('/admin/terima/{id}',[AC::class, 'terima'])->name('admin.terima');
    Route::get('/admin/tolak/{id}',[AC::class, 'tolak'])->name('admin.tolak');
    Route::get('/admin/batal/{id}',[AC::class, 'batal'])->name('admin.batal');
    Route::get('/admin/show/{id}', [AC::class, 'show'])->name('admin.show');

});

Route::get('/user/document', [DC::class, 'show'])->name('user.document');
Route::get('/user/create', [DC::class, 'create'])->name('user.create');
Route::post('/user/store', [DC::class, 'store'])->name('user.store');
Route::delete('/user/delete/{id}', [DC::class, 'destroy'])->name('user.delete');
Route::get('user/edit/{id}',[DC::class, 'edit'])->name('user.edit');
Route::patch('user/update/{id}', [DC::class, 'update'])->name('user.update');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
