@extends('layouts.app')

@section('content')
<h1>Crear Usuario</h1>

<a href="{{ route('users.index') }}">Volver al listado</a>

<form action="{{ route('users.store') }}" method="POST">
    @csrf
    
    <div>
        <label for="name">Nombre:</label><br>
        <input type="text" name="name" id="name" value="{{ old('name') }}" required>
    </div>

    <div>
        <label for="email">Email:</label><br>
        <input type="email" name="email" id="email" value="{{ old('email') }}" required>
    </div>

    <div>
        <label for="password">Contraseña:</label><br>
        <input type="password" name="password" id="password">
        <small>(Dejar vacío para usar contraseña por defecto)</small>
    </div>

    <br>
    <button type="submit">Crear Usuario</button>
</form>
@endsection