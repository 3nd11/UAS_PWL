<?php

use App\Http\Controllers\SaldoController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\PemasukanController;
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
    return view('layouts.beranda');
});

Route::get('/form', function () {
    return view('layouts.form');
});

Route::get('/beranda', function () {
    return view('layouts.beranda');
});

Route::get('/index', function () {
    // return view('welcome');
    return view('layouts.index');
});

Route::get('/dashboard', function () {
    return view('dashboard.dashboard');
});

Route::get('/login', function () {
    return view('layouts.login');
});

Route::get('/about', function () {
    return view('layouts.about');
});

Route::get('/visimisi', function () {
    return view('layouts.visimisi');
});

Route::get('/manajemen', function () {
    return view('layouts.manajemen');
});

Route::resource('/pengeluaran', PengeluaranController::class)->middleware('auth');
Route::resource('/pemasukan', PemasukanController::class)->middleware('auth');
Route::resource('/saldo', SaldoController::class)->middleware('auth');
Route::get('generate-pdf',[SaldoController::class, 'generate-pdf'])->middleware('auth');
Route::get('saldopdf',[SaldoController::class, 'saldopdf'])->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
