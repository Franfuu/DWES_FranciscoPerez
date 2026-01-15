@extends('layouts.app')

@section('title', 'Editar Artículo')

@section('content')
<div class="card">
    <div class="card-header">
        <h1>Editar Artículo</h1>
        <a href="{{ route('clothing-items.index') }}" class="btn btn-secondary">🔙 Volver al Listado</a>
    </div>

    <form method="POST" action="{{ route('clothing-items.update', $clothingItem->id) }}">
        @csrf
        @method('PUT')

        <div class="form-grid">
            <div class="form-group">
                <label for="name">📝 Nombre</label>
                <input type="text" name="name" id="name" value="{{ old('name', $clothingItem->name) }}" required>
            </div>
            <div class="form-group">
                <label for="size">📏 Talla</label>
                <input type="text" name="size" id="size" value="{{ old('size', $clothingItem->size) }}" required>
            </div>
            <div class="form-group">
                <label for="price">💰 Precio ($)</label>
                <input type="text" name="price" id="price" value="{{ old('price', $clothingItem->price) }}" required>
            </div>
            <div class="form-group">
                <label for="color">🎨 Color</label>
                <input type="text" name="color" id="color" value="{{ old('color', $clothingItem->color) }}" required>
            </div>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-success">✅ Actualizar</button>
            <a href="{{ route('clothing-items.index') }}" class="btn btn-danger">❌ Cancelar</a>
        </div>
    </form>
</div>
@endsection