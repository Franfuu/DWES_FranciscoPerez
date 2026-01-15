<div>
    <label for="name">Nombre:</label><br>
    <input type="text" name="name" id="name" value="{{ old('name', $user->name ?? '') }}" required>
</div>

<div>
    <label for="email">Email:</label><br>
    <input type="email" name="email" id="email" value="{{ old('email', $user->email ?? '') }}" required>
</div>

<div>
    <label for="password">Contraseña:</label><br>
    <input type="password" name="password" id="password">
    @if(isset($user) && $user->exists)
        <small>(Dejar vacío para mantener la actual)</small>
    @else
        <small>(Dejar vacío para usar contraseña por defecto)</small>
    @endif
</div>