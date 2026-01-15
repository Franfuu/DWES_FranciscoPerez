@extends('layouts.app')

@section('title', 'Listado de Artículos')

@section('content')
<div class="card">
    <div class="card-header">
        <h1>Clothing Items</h1>
        <a href="{{ route('clothing-items.create') }}" class="btn btn-primary">➕ Añadir Artículo</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Talla</th>
                <th>Precio</th>
                <th>Color</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($items as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>{{ $item->size }}</td>
                <td class="price">${{ number_format($item->price, 2) }}</td>
                <td><span class="color-badge">{{ $item->color }}</span></td>
                <td>
                    <div class="actions">
                        <a href="{{ route('clothing-items.show', $item) }}" class="btn btn-info btn-sm">👁️ Ver</a>
                        <a href="{{ route('clothing-items.edit', $item) }}" class="btn btn-warning btn-sm">✏️ Editar</a>
                        <form method="POST" action="{{ route('clothing-items.destroy', $item) }}" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este artículo?')">🗑️ Eliminar</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" style="text-align: center; padding: 40px;">No hay artículos disponibles 😢</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection