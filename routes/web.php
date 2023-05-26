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


