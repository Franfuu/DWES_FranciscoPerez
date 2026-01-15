@extends('layouts.app')

@section('title', 'Crear Artículo')

@section('content')
<div class="card">
    <div class="card-header">
        <h1>Crear Nuevo Artículo</h1>
    </div>

    <form method="POST" action="{{ route('clothing-items.store') }}">
        @csrf
        <div class="form-grid">
            <div class="form-group">
                <label for="name">📝 Nombre</label>
                <input type="text" name="name" id="name" placeholder="Ej: Camiseta deportiva" required>
            </div>
            <div class="form-group">
                <label for="size">📏 Talla</label>
                <input type="text" name="size" id="size" placeholder="Ej: M, L, XL" required>
            </div>
            <div class="form-group">
                <label for="price">💰 Precio ($)</label>
                <input type="text" name="price" id="price" placeholder="Ej: 29.99" required>
            </div>
            <div class="form-group">
                <label for="color">🎨 Color</label>
                <input type="text" name="color" id="color" placeholder="Ej: Azul, Rojo" required>
            </div>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-success">✅ Guardar Artículo</button>
            <a href="{{ route('clothing-items.index') }}" class="btn btn-secondary">❌ Cancelar</a>
        </div>
    </form>
</div>
@endsection