<?php

use App\Http\Controllers\ProductoController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/usuarios');

Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');
Route::delete('/usuarios/{id}', [UsuarioController::class, 'destroy'])->name('usuarios.destroy');
Route::get('/usuarios/{id}/edit', [UsuarioController::class, 'edit'])->name('usuarios.edit');
Route::put('/usuarios/{id}', [UsuarioController::class, 'update'])->name('usuarios.update');



Route::get('/usuarios/create', [UsuarioController::class, 'create'])->name('usuarios.create');
Route::post('/usuarios/create', [UsuarioController::class, 'store'])->name('usuarios.store');

Route::get('/tickets', [TicketController::class, 'index'])->name('tickets.index');
Route::delete('/tickets/{ticket}', [TicketController::class, 'destroy'])->name('tickets.destroy');

Route::get('/tickets/{ticket}/edit', [TicketController::class, 'edit'])->name('tickets.edit');
Route::put('/tickets/{ticket}', [TicketController::class, 'update'])->name('tickets.update');

Route::get('/ticket/create', [TicketController::class, 'create'])->name('tickets.create');
Route::post('/ticket/create', [TicketController::class, 'store'])->name('tickets.store');
