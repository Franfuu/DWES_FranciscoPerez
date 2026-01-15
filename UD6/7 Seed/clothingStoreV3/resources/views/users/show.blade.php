@extends('layouts.app')

@section('content')
<h1>Detalle del Usuario</h1>

<a href="{{ route('users.index') }}">Volver al listado</a>

<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>ID</th>
        <td>{{ $user->id }}</td>
    </tr>
    <tr>
        <th>Nombre</th>
        <td>{{ $user->name }}</td>
    </tr>
    <tr>
        <th>Email</th>
        <td>{{ $user->email }}</td>
    </tr>
    <tr>
        <th>Creado</th>
        <td>{{ $user->created_at->format('d/m/Y H:i') }}</td>
    </tr>
    <tr>
        <th>Actualizado</th>
        <td>{{ $user->updated_at->format('d/m/Y H:i') }}</td>
    </tr>
</table>

<br>
<a href="{{ route('users.edit', $user) }}">Editar</a> |
<form action="{{ route('users.destroy', $user) }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit" onclick="return confirm('¿Eliminar usuario?')">Eliminar</button>
</form>
@endsection