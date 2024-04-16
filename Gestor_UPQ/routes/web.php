<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RegistroController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/docencia', function () {
    return view('docencia');
});
Route::post('EnvioDatos', [RegistroController::class,'Insertar']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
