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
    //return view('catalogo.index');
    return redirect()->route('catalogo.usuario');
});

Auth::routes();


//ARTICULOS
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function() {
    Route::get('/articulos', [App\Http\Controllers\ArticuloController::class, 'lista'])->name('articulos');
    Route::get('/departamentos', [\App\Http\Controllers\DepartamentoController::class, 'lista'])->name('departamentos');
    Route::get('/barrios', [\App\Http\Controllers\BarrioController::class, 'lista'])->name('barrios');
    Route::get('/categorias', [\App\Http\Controllers\CategoriaController::class, 'lista'])->name('categorias');
    Route::get('/proveedores', [\App\Http\Controllers\ProveedorController::class, 'lista'])->name('proveedores');
    Route::get('/usuarios', [\App\Http\Controllers\UsuarioController::class, 'lista'])->name('usuarios');
    Route::get('/inventario', [\App\Http\Controllers\InventarioController::class, 'lista'])->name('inventario');
});

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
//Route::get('/categorias' ,[\App\Http\Controllers\CategoriaController::class, 'show'])->name('categorias');


Route::get('/prueba', function(){
    \Cart::destroy();
})->name('prueba');


Route::get('shopping-cart', \App\Http\Livewire\ShoppingCart::class)->name('shopping-cart');

Route::get('search', \App\Http\Controllers\SearchController::class)->name('search');


Route::middleware(['auth'])->group(function(){

    Route::get('orders', [\App\Http\Controllers\OrderController::class, 'index'])->name('orders.index');

    Route::get('orders/create', \App\Http\Livewire\CreateOrder::class)->name('orders.create');

    Route::get('orders/{order}',[\App\Http\Controllers\OrderController::class, 'show'])->name('orders.show');
    Route::get('orders/{order}/payment',[\App\Http\Controllers\OrderController::class, 'payment'])->name('orders.payment');
    Route::post('webhooks', \App\Http\Controllers\WebhooksController::class);

//ruta provisional para notificar pagos en mercado pago
    Route::get('orders/{order}/pay', [\App\Http\Controllers\OrderController::class,'pay'])->name('orders.pay');
});

Route::get('ordenes', [\App\Http\Controllers\AdminOrderController::class,'index'])->name('admin.orders.index');
Route::get('ordenes/{orden}', [\App\Http\Controllers\AdminOrderController::class,'show'])->name('admin.orders.show');

