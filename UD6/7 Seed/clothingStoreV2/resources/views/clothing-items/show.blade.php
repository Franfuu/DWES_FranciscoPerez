@extends('layouts.app')

@section('title', 'Detalle del Artículo')

@section('content')
<div class="card">
    <div class="card-header">
        <h1>{{ $clothingItem->name }}</h1>
        <a href="{{ route('clothing-items.index') }}" class="btn btn-secondary">🔙 Volver al Listado</a>
    </div>

    <div class="detail-item">
        <span class="detail-label">📝 Nombre:</span>
        <span class="detail-value">{{ $clothingItem->name }}</span>
    </div>
    <div class="detail-item">
        <span class="detail-label">📏 Talla:</span>
        <span class="detail-value">{{ $clothingItem->size }}</span>
    </div>
    <div class="detail-item">
        <span class="detail-label">💰 Precio:</span>
        <span class="detail-value price">${{ number_format($clothingItem->price, 2) }}</span>
    </div>
    <div class="detail-item">
        <span class="detail-label">🎨 Color:</span>
        <span class="detail-value"><span class="color-badge">{{ $clothingItem->color }}</span></span>
    </div>

    <div class="form-actions">
        <a href="{{ route('clothing-items.edit', $clothingItem->id) }}" class="btn btn-warning">✏️ Editar</a>
        <form method="POST" action="{{ route('clothing-items.destroy', $clothingItem->id) }}" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este artículo?')">🗑️ Eliminar</button>
        </form>
    </div>
</div>
@endsection