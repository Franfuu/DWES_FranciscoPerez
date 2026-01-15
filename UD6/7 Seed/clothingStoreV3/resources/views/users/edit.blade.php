@extends('layouts.app')

@section('content')
<h1>Editar Usuario</h1>

<a href="{{ route('users.index') }}">Volver al listado</a>

<form action="{{ route('users.update', $user) }}" method="POST">
    @csrf
    @method('PUT')
    
    <div>
        <label for="name">Nombre:</label><br>
        <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" required>
    </div>

    <div>
        <label for="email">Email:</label><br>
        <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" required>
    </div>

    <div>
        <label for="password">Nueva Contraseña:</label><br>
        <input type="password" name="password" id="password">
        <small>(Dejar vacío para mantener la actual)</small>
    </div>

    <br>
    <button type="submit">Actualizar Usuario</button>
</form>
@endsection