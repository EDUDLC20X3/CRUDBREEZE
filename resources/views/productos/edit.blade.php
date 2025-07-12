@extends('layouts.app')

@section('title', 'Editar Producto')

@section('content')
    <h1>Editar Producto</h1>
    <form action="{{ route('productos.update', $producto) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $producto->nombre) }}" required>
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea name="descripcion" class="form-control">{{ old('descripcion', $producto->descripcion) }}</textarea>
        </div>
        <div class="mb-3">
            <label for="precio" class="form-label">Precio</label>
            <input type="number" name="precio" class="form-control" step="0.01" value="{{ old('precio', $producto->precio) }}" required>
        </div>
        <div class="mb-3">
            <label for="categoria_id" class="form-label">Categoría</label>
            @if($categorias->count() > 0)
                <select name="categoria_id" class="form-control" required>
                    <option value="">Seleccione una categoría</option>
                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id }}" {{ old('categoria_id', $producto->categoria_id) == $categoria->id ? 'selected' : '' }}>
                            {{ $categoria->nombre }}
                        </option>
                    @endforeach
                </select>
            @else
                <div class="alert alert-warning">
                    No hay categorías disponibles. <a href="{{ route('categorias.create') }}">Crea una categoría</a> antes de editar productos.
                </div>
            @endif
        </div>
        <button type="submit" class="btn btn-success" {{ $categorias->count() == 0 ? 'disabled' : '' }}>Actualizar</button>
        <a href="{{ route('productos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>