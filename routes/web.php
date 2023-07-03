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
Route::get('/index2', [HomeController::class,"index2"])->name("index2")->middleware("Check");


Route::get('/formLogin', [HomeController::class,"formLogin"])->name("formLogin")->middleware("Check");
Route::get('/authLogin', [HomeController::class,"authLogin"])->name("authLogin");
Route::get('/loginDentro',[HomeController::class,"loginDentro"])->name("loginDentro")->middleware("auth");
Route::get('/logout',[HomeController::class,"logout"])->name("logout")->middleware("auth");


//productos
Route::get('/formCrearProducto',[HomeController::class,"formCrearProducto"])->name("formCrearProducto")->middleware("auth");
Route::post('/storeProducto',[HomeController::class,"storeProducto"])->name("storeProducto")->middleware("auth");
Route::get('/eliminarProducto',[HomeController::class,"eliminarProducto"])->name("eliminarProducto")->middleware("auth");
Route::get('/actualizarProducto',[HomeController::class,"actualizarProducto"])->name("actualizarProducto")->middleware("auth");
Route::get('/storeActualizarProducto',[HomeController::class,"storeActualizarProducto"])->name("storeActualizarProducto")->middleware("auth");


//categoria
Route::get('/formCrearCategoria',[HomeController::class,"formCrearCategoria"])->name("formCrearCategoria")->middleware("auth");
Route::get('/storeCategoria',[HomeController::class,"storeCategoria"])->name("storeCategoria")->middleware("auth");
Route::post('/eliminarCategoria',[HomeController::class,"eliminarCategoria"])->name("eliminarCategoria")->middleware("auth");
Route::get('/actualizarCategoria',[HomeController::class,"actualizarCategoria"])->name("actualizarCategoria")->middleware("auth");
Route::get('/storeActualizarCategoria',[HomeController::class,"storeActualizarCategoria"])->name("storeActualizarCategoria")->middleware("auth");

//Colores
Route::get('/formCrearColores',[HomeController::class,"formCrearColores"])->name("formCrearColores")->middleware("auth");
Route::get('/storeColores',[HomeController::class,"storeColores"])->name("storeColores")->middleware("auth");
Route::post('/eliminarColor',[HomeController::class,"eliminarColor"])->name("eliminarColor")->middleware("auth");
Route::get('/actualizarColor',[HomeController::class,"actualizarColor"])->name("actualizarColor")->middleware("auth");
Route::get('/storeActualizarColor',[HomeController::class,"storeActualizarColor"])->name("storeActualizarColor")->middleware("auth");

//tamaños
Route::get('/formCrearTamaños',[HomeController::class,"formCrearTamaños"])->name("formCrearTamaños")->middleware("auth");
Route::get('/storeTamaños',[HomeController::class,"storeTamaños"])->name("storeTamaños")->middleware("auth");
Route::post('/eliminarTamaño',[HomeController::class,"eliminarTamaño"])->name("eliminarTamaño")->middleware("auth");
Route::get('/actualizarTamaño',[HomeController::class,"actualizarTamaño"])->name("actualizarTamaño")->middleware("auth");
Route::get('/storeActualizarTamaño',[HomeController::class,"storeActualizarTamaño"])->name("storeActualizarTamaño")->middleware("auth");


//TablaFotos
Route::get('/formAñadirImagenes',[HomeController::class,"formAñadirImagenes"])->name("formAñadirImagenes")->middleware("auth");
Route::get('/colorSeleccionado',[HomeController::class,"colorSeleccionado"])->name("colorSeleccionado")->middleware("auth");
Route::post('/storeProductoFotos',[HomeController::class,"storeProductoFotos"])->name("storeProductoFotos")->middleware("auth");
Route::post('/storeProductoFotosImagenes',[HomeController::class,"storeProductoFotosImagenes"])->name("storeProductoFotosImagenes")->middleware("auth");
Route::post('/storeProductoFotosTamañoCantidad',[HomeController::class,"storeProductoFotosTamañoCantidad"])->name("storeProductoFotosTamañoCantidad")->middleware("auth");
Route::get('/eliminarProductoTablaFotos',[HomeController::class,"eliminarProductoTablaFotos"])->name("eliminarProductoTablaFotos")->middleware("auth");


//jQuerySelectColor
Route::get('/jqTamaños',[HomeController::class,"jqTamaños"])->name("jqTamaños");
Route::get('/jqImagenes',[HomeController::class,"jqImagenes"])->name("jqImagenes");


//Carrito de compras
Route::get('/carritoCompra',[HomeController::class,"carritoCompra"])->name("carritoCompra");




