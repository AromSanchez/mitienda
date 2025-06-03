<?php

use App\Http\Controllers\ProductoController;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductoController::class, 'index'])->name('productos.index');
Route::post('/', [ProductoController::class, 'store'])->name('productos.store');
Route::delete('/{producto}', [ProductoController::class, 'destroy'])->name('productos.destroy');
Route::get('/{id}/edit', [ProductoController::class, 'edit'])->name('productos.edit');

// Rutas para tickets
Route::resource('tickets', TicketController::class);
