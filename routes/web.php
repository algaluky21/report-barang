<?php

use App\Http\Controllers\BarangController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PlcController;
use App\Http\Controllers\UmumController;
use App\Http\Controllers\ReportBarangController;

// Route::resource('posts', PostController::class);




// Route::resource('reports', PlcController::class)->middleware('auth');



Route::resource('/', UmumController::class);
Route::get('umums/data', [PlcController::class, 'getPlcData'])->name('umums.data');

// Route::get('/', function () {
//     return view('welcome');
// });

// Route Login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('login', [LoginController::class, 'authenticate']);

// Route Register
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);

//Route Logout
Route::post('logout', [LoginController::class, 'logout']);

Route::get('/dashboard', function(){ return view('dashboard.index');} );

//Route Barang
Route::resource('barang', BarangController::class)->middleware('auth');
Route::get('/barangs/data', [BarangController::class, 'getBarangsData'])->name('barangs.data');
Route::get('/barangs/update/{id}', [BarangController::class, 'update'])->name('barangs.update');
Route::delete('/barangs/delete/{id}', [BarangController::class, 'destroy'])->name('barangs.delete');
Route::get('/barangs/{id}', [BarangController::class, 'show'])->name('barangs.show');
Route::put('/barangs/{id}', [BarangController::class, 'update'])->name('barangs.update');

// Route Report Barang
Route::resource('reports', ReportBarangController::class)->middleware('auth');
Route::get('report-barangs', [ReportBarangController::class, 'index'])->name('report_barangs.index');
Route::get('report-barangs/data', [ReportBarangController::class, 'getData'])->name('report-barangs.data');
// Route::put('report-barangs/{id}', [ReportBarangController::class, 'update'])->name('report_barangs.update');
// Route::delete('report-barangs/{id}', [ReportBarangController::class, 'destroy'])->name('report_barangs.destroy');
// Route::get('report-barangs/{id}', [ReportBarangController::class, 'show'])->name('report_barangs.show');

// Route PLC
Route::resource('plcs', PlcController::class)->middleware('auth');
Route::get('plc/data', [PlcController::class, 'getPlcData'])->name('plc.data');
Route::post('/plc/update/{id}', [PlcController::class, 'update'])->name('plc.update');
Route::delete('/plc/delete/{id}', [PlcController::class, 'destroy'])->name('plc.deletee');
Route::get('/plcs/{id}', [PlcController::class, 'show'])->name('plc.show');
Route::put('/plcs/{id}', [PlcController::class, 'update'])->name('plc.update');