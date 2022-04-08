<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/categorias', [\App\Http\Controllers\CategoriaController::class, 'index'])->name('listar_categorias');
Route::post('/categorias', [\App\Http\Controllers\CategoriaController::class, 'store'])->name('crear_categoria');
Route::put('/categorias/{id}', [\App\Http\Controllers\CategoriaController::class, 'update'])->name('actualizar_categoria');
Route::delete('/categorias/{id}', [\App\Http\Controllers\CategoriaController::class, 'destroy'])->name('eliminar_categoria');

Route::get('/proveedores', [\App\Http\Controllers\ProveedorController::class, 'index'])->name('listar_proveedores');
Route::post('/proveedores', [\App\Http\Controllers\ProveedorController::class, 'store'])->name('crear_proveedor');
Route::put('/proveedores/{id}', [\App\Http\Controllers\ProveedorController::class, 'update'])->name('actualizar_proveedor');
Route::delete('/proveedores/{id}', [\App\Http\Controllers\ProveedorController::class, 'destroy'])->name('eliminar_proveedor');

Route::get('/articulos', [\App\Http\Controllers\ArticuloController::class, 'index'])->name('listar_articulos');
Route::post('/articulos', [\App\Http\Controllers\ArticuloController::class, 'store'])->name('crear_articulo');
Route::put('/articulos/{id}', [\App\Http\Controllers\ArticuloController::class, 'update'])->name('actualizar_articulo');
Route::delete('/articulos/{id}', [\App\Http\Controllers\ArticuloController::class, 'destroy'])->name('eliminar_articulo');

Route::get('/usuarios', [\App\Http\Controllers\UsuarioController::class, 'index'])->name('listar_usuarios');
Route::get('/usuarios/{id}', [\App\Http\Controllers\UsuarioController::class, 'show'])->name('ver_usuario');
Route::post('/usuarios', [\App\Http\Controllers\UsuarioController::class, 'store'])->name('crear_usuario');
Route::put('/usuarios/{id}', [\App\Http\Controllers\UsuarioController::class, 'update'])->name('actualizar_usuario');
Route::delete('/usuarios/{id}', [\App\Http\Controllers\UsuarioController::class, 'destroy'])->name('eliminar_usuario');

Route::get('/clientes', [\App\Http\Controllers\ClienteController::class, 'index'])->name('listar_clientes');
Route::get('/clientes/{id}', [\App\Http\Controllers\ClienteController::class, 'show'])->name('ver_cliente');
Route::post('/clientes', [\App\Http\Controllers\ClienteController::class, 'store'])->name('crear_cliente');
Route::put('/clientes/{id}', [\App\Http\Controllers\ClienteController::class, 'update'])->name('actualizar_cliente');
Route::delete('/clientes/{id}', [\App\Http\Controllers\ClienteController::class, 'destroy'])->name('eliminar_cliente');
