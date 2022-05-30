<?php

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
    return view('welcome');
});

Auth::routes();


//ARTICULOS
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/articulos', [App\Http\Controllers\ArticuloController::class, 'lista'])->name('articulos');
Route::get('/articulo/edit/{id}', [App\Http\Controllers\ArticuloController::class, 'edit'])->name('articulo.edit');
Route::get('/detalle', [App\Http\Controllers\ArticuloController::class, 'detalle'])->name('detalle');
Route::get('/articulos/lista', [App\Http\Controllers\DatatableController::class, 'listarArticulos'])->name('articulos.lista');
Route::get('/articulos/{articulo}',[App\Http\Controllers\ArticuloController::class, 'show'])->name('articulos.show');
//CATALOGO USUARIO
Route::get('/catalogo', [\App\Http\Controllers\ArticuloController::class, 'catalogoUsuario'])->name('catalogo.usuario');
//Auth::routes();

//CARRO
Route::get('/carro', [\App\Http\Controllers\CarroController::class, 'llamarCheckout'])->name('llamar.checkout');
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/categorias/{categoria}' ,[\App\Http\Controllers\CategoriaController::class, 'show'])->name('categorias.show');
Route::get('/categorias' ,[\App\Http\Controllers\CategoriaController::class, 'show'])->name('categorias');


Route::get('/prueba', function(){
    \Cart::destroy();
})->name('prueba');


Route::get('shopping-cart', \App\Http\Livewire\ShoppingCart::class)->name('shopping-cart');

Route::get('search', \App\Http\Controllers\SearchController::class)->name('search');

Route::get('orders/create', \App\Http\Livewire\CreateOrder::class)->middleware('auth')->name('orders.create');

Route::get('orders/{order}/payment',[\App\Http\Controllers\OrderController::class, 'payment'])->name('orders.payment');
