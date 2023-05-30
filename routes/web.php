<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class,"index"])->name("index");



Route::get('/formLogin', [HomeController::class,"formLogin"])->name("formLogin");
Route::get('/authLogin', [HomeController::class,"authLogin"])->name("authLogin");
Route::get('/loginDentro',[HomeController::class,"loginDentro"])->name("loginDentro")->middleware("auth");
Route::get('/logout',[HomeController::class,"logout"])->name("logout")->middleware("auth");
Route::get('/formCrear',[HomeController::class,"formCrear"])->name("formCrear")->middleware("auth");


Route::get('/formCrearCategoria',[HomeController::class,"formCrearCategoria"])->name("formCrearCategoria")->middleware("auth");
Route::get('/storeCategoria',[HomeController::class,"storeCategoria"])->name("storeCategoria")->middleware("auth");
Route::post('/eliminarCategoria',[HomeController::class,"eliminarCategoria"])->name("eliminarCategoria")->middleware("auth");
Route::get('/actualizarCategoria',[HomeController::class,"actualizarCategoria"])->name("actualizarCategoria")->middleware("auth");
Route::get('/storeActualizarCategoria',[HomeController::class,"storeActualizarCategoria"])->name("storeActualizarCategoria")->middleware("auth");



