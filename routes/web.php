<?php

use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductoController::class, 'index'])->name('productos.index');
Route::post('/', [ProductoController::class, 'store'])->name('productos.store');
Route::delete('/{producto}', [ProductoController::class, 'destroy'])->name('productos.destroy');
Route::put('/{producto}', [ProductoController::class, 'update'])->name('productos.update');

