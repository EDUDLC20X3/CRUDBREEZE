<?php

use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\ClienteController;
use App\Models\Categoria;
use Illuminate\Support\Facades\Route;

Route::resource('productos', ProductoController::class);
Route::resource('categorias', CategoriaController::class);