# 1nTrophies - Relación One-to-Many en Laravel

## Estructura del Proyecto

Este proyecto demuestra una relación **One-to-Many (1:N)** entre `User` y `Trophy` en Laravel.

### Concepto de la Relación

- Un **User** tiene muchos **Trophies** (`hasMany`)
- Un **Trophy** pertenece a un único **User** (`belongsTo`)
- Cada usuario puede tener múltiples trofeos asignados

---

## Archivos del Proyecto

### 1. Modelo User - `app/Models/User.php`

```php
<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = ['name', 'email'];

    public function trophies(): HasMany
    {
        return $this->hasMany(Trophy::class);
    }
}
```

> **Nota**: El método `hasMany()` define que un usuario puede tener múltiples trofeos.

---

### 2. Modelo Trophy - `app/Models/Trophy.php`

```php
<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Trophy extends Model
{
    protected $fillable = ['user_id', 'title', 'description'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
```

> **Nota**: El método `belongsTo()` define la relación inversa - cada trofeo pertenece a un usuario.

---

### 3. Controlador - `app/Http/Controllers/UserController.php`

```php
<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    // Show all users and their trophies
    public function index()
    {
        // Eager-load trophies to reduce queries
        $users = User::with('trophies')->get();
        return view('users.index', compact('users'));
    }

    // Show trophies for a specific user
    public function showTrophies($id)
    {
        $user = User::with('trophies')->findOrFail($id);
        return view('users.trophies', compact('user'));
    }
}
```

> **Nota**: `with('trophies')` usa **Eager Loading** para cargar todos los trofeos en una sola consulta, evitando el problema N+1.

---

### 4. Rutas - `routes/web.php`

```php
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/users', [UserController::class, 'index'])
     ->name('users.index');

Route::get('/users/{id}/trophies', [UserController::class, 'showTrophies'])
     ->name('users.trophies');
```

---

### 5. Migración Trophies - `database/migrations/create_trophies_table.php`

```php
<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('trophies', function (Blueprint $table) {
            $table->id();
            // FK to users; cascade so deleting a user removes their trophies
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            $table->string('title');                   // trophy name
            $table->string('description')->nullable(); // optional details
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('trophies');
    }
};
```

> **Nota**: La clave foránea `user_id` permite que múltiples trofeos apunten al mismo usuario (relación 1:N).

---

### 6. Seeders

#### `database/seeders/DatabaseSeeder.php`

```php
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UsersSeeder::class,    // must run first
            TrophiesSeeder::class, // relies on user IDs 1..3
        ]);
    }
}
```

#### `database/seeders/UsersSeeder.php`

```php
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'aria@example.com'],
            ['name' => 'Aria Nightwind', 'password' => Hash::make('password')]
        );

        User::firstOrCreate(
            ['email' => 'borin@example.com'],
            ['name' => 'Borin Stonehelm', 'password' => Hash::make('password')]
        );

        User::firstOrCreate(
            ['email' => 'selene@example.com'],
            ['name' => 'Selene Riversong', 'password' => Hash::make('password')]
        );
    }
}
```

#### `database/seeders/TrophiesSeeder.php`

```php
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Trophy;

class TrophiesSeeder extends Seeder
{
    public function run(): void
    {
        Trophy::insert([
            // Aria (user_id = 1)
            ['user_id' => 1, 'title' => 'Master Archer',  'description' => 'Top score in precision challenge', 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 1, 'title' => 'Shadow Runner',  'description' => 'Fastest stealth course time',       'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 1, 'title' => 'Sky Watcher',    'description' => 'Completed aerial trials',           'created_at' => now(), 'updated_at' => now()],

            // Borin (user_id = 2)
            ['user_id' => 2, 'title' => 'Dragon Slayer',  'description' => 'Defeated the cavern drake',         'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 2, 'title' => 'Stone Guardian', 'description' => 'Held the line for 10 waves',        'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 2, 'title' => 'Axe Maestro',    'description' => 'Perfect axe technique award',       'created_at' => now(), 'updated_at' => now()],

            // Selene (user_id = 3)
            ['user_id' => 3, 'title' => 'River Champion', 'description' => 'Won the river regatta',             'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 3, 'title' => 'Lore Keeper',    'description' => 'Solved all ancient riddles',        'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 3, 'title' => 'Moonlit Victor', 'description' => 'Tournament champion at night',      'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
```

---

## Vistas

### 7. Layout - `resources/views/layouts/app.blade.php`

```blade
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Users & Trophies')</title>
    <link rel="stylesheet" href="{{ asset('css/warrior.css') }}">
</head>
<body>
    <nav class="container-fluid">
        <ul>
            <li><strong><a href="{{ url('/') }}">🏆 Laravel Trophies</a></strong></li>
        </ul>
        <ul>
            <li><a href="{{ url('/users') }}">Users</a></li>
        </ul>
    </nav>

    <main class="container">
        @yield('content')
    </main>

    <footer class="container">
        <small>© {{ date('Y') }}</small>
    </footer>
</body>
</html>
```

---

### 8. Vistas de Usuarios

#### `resources/views/users/index.blade.php`

```blade
@extends('layouts.app')

@section('title', 'Users')

@section('content')
    @if ($users->isEmpty())
        <p>No users found.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Trophies</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->trophies->count() }}</td>
                    <td>
                        <a href="{{ route('users.trophies', $user->id) }}">View trophies</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@endsection
```

#### `resources/views/users/trophies.blade.php`

```blade
@extends('layouts.app')

@section('title', 'Trophies for ' . $user->name)

@section('content')
    <p><a href="{{ url('/users') }}">← Back to users</a></p>

    @if ($user->trophies->isEmpty())
        <p>No trophies yet.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Created</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($user->trophies as $trophy)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><strong>{{ $trophy->title }}</strong></td>
                    <td>{{ $trophy->description }}</td>
                    <td>{{ $trophy->created_at->format('Y-m-d H:i') }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@endsection
```

---

## Diagrama de la Relación

```
┌──────────────┐         ┌──────────────────┐
│    users     │         │     trophies     │
├──────────────┤         ├──────────────────┤
│ id (PK)      │◄────────┤ user_id (FK)     │
│ name         │   1:N   │ id (PK)          │
│ email        │         │ title            │
│ ...          │         │ description      │
└──────────────┘         │ timestamps       │
                         └──────────────────┘
```

---

## Diferencia entre 1:1 y 1:N

| Aspecto         | One-to-One (1:1)                              | One-to-Many (1:N)       |
| --------------- | --------------------------------------------- | ----------------------- |
| Relación       | `hasOne()`                                  | `hasMany()`           |
| Restricción FK | `unique('user_id')`                         | Sin restricción unique |
| Ejemplo         | User → Championship                          | User → Trophies        |
| Acceso          | `$user->championship` | `$user->trophies` |                         |
| Retorno         | Un objeto o null                              | Colección              |

---

## Comandos de Base de Datos

| Comando                              | Descripción                                   |
| ------------------------------------ | ---------------------------------------------- |
| `php artisan migrate`              | Ejecuta las migraciones (crea las tablas)      |
| `php artisan migrate:fresh`        | Borra todas las tablas y las vuelve a crear    |
| `php artisan migrate:fresh --seed` | Borra tablas, las recrea y ejecuta los seeders |
| `php artisan db:seed`              | Ejecuta todos los seeders                      |

---

## Comandos de Caché

| Comando                      | Descripción                              |
| ---------------------------- | ----------------------------------------- |
| `php artisan cache:clear`  | Limpia la caché de la aplicación        |
| `php artisan view:clear`   | Limpia la caché de las vistas compiladas |
| `php artisan config:clear` | Limpia la caché de configuración        |

---

## Servidor

| Comando               | Descripción                                    |
| --------------------- | ----------------------------------------------- |
| `php artisan serve` | Inicia el servidor en `http://127.0.0.1:8000` |

---

## Acceso a la Aplicación

Una vez iniciado el servidor, accede a:

- **Lista de usuarios**: `http://127.0.0.1:8000/users`
- **Trofeos de un usuario**: `http://127.0.0.1:8000/users/{id}/trophies`
