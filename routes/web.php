<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PlcController;
use App\Http\Controllers\UmumController;
use App\Http\Controllers\ReportBarangController;

Route::resource('posts', PostController::class);

Route::resource('plcs', PlcController::class);

Route::resource('reports', ReportBarangController::class);
// Route::resource('reports', PlcController::class)->middleware('auth');



Route::resource('umums', UmumController::class);

Route::get('/', function () {
    return view('welcome');
});


Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('login', [LoginController::class, 'authenticate']);


Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::post('logout', [LoginController::class, 'logout']);

Route::get('/dashboard', function(){ return view('dashboard.index');} );
