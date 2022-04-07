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

