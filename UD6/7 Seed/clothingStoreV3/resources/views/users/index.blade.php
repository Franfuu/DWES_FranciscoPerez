@extends('layouts.app')

@section('content')
<h1>Listado de Usuarios</h1>

@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<a href="{{ route('users.create') }}">Crear nuevo usuario</a>

<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Creado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->created_at->format('d/m/Y') }}</td>
                <td>
                    <a href="{{ route('users.show', $user) }}">Ver</a> |
                    <a href="{{ route('users.edit', $user) }}">Editar</a> |
                    <form action="{{ route('users.destroy', $user) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('¿Eliminar usuario?')">Eliminar</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5">No hay usuarios registrados.</td>
            </tr>
        @endforelse
    </tbody>
</table>

{{ $users->links() }}
@endsection