<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RegistroController;
use App\Http\Controllers\PdfController;
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
Route::get('/investigacion', function () {
    return view('investigacion');
});
Route::get('/gestion', function () {
    return view('gestion');
});
Route::get('/tutoria', function () {
    return view('tutoria');
});

Route::post('/upload/pdf', [PdfController::class, 'uploadPdf'])->name('upload.pdf');

Route::post('EnvioDatos', [RegistroController::class,'Insertar']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
