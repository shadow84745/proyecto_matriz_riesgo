<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\RiesgoController;
use App\Http\Controllers\UserController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('home', ProyectoController::class);
Route::resource('profile', UserController::class);
Route::get('/matrizriesgo/{id}', [RiesgoController::class, 'show'])->name('matrizriesgo.show');
Route::post('/matrizriesgo/{id}', [RiesgoController::class, 'store'])->name('matrizriesgo.store');

Route::put('/matrizriesgo/{id}', [RiesgoController::class, 'update'])->name('matrizriesgo.update');
Route::delete('/matrizriesgo/{id}', [RiesgoController::class, 'destroy'])->name('matrizriesgo.destroy');

