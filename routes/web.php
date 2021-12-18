<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\barangcontroller;
use App\Http\Controllers\transaksicontroller;
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

Route::get('/', [barangcontroller::class, 'index'])->name(name:'index');
Route::post('/insertcart', [transaksicontroller::class, 'insertcart']);
Route::get('/cart', [transaksicontroller::class, 'cart']);
Route::post('/inputtransaksi', [transaksicontroller::class, 'inputtransaksi']);
Route::get('/cart/hapus/{id}', [transaksicontroller::class,'hapuscart']);
Route::get('/transaksi', [transaksicontroller::class, 'showtransaksi']);
Route::get('/detail/{id}', [transaksicontroller::class, 'showdetail']);
Route::get('/forgetcart', [transaksicontroller::class, 'forgetcart']);