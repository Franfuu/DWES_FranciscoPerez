# OneWarriors - Relación One-to-One en Laravel

## Estructura del Proyecto

Este proyecto demuestra una relación **One-to-One (1:1)** entre `User` y `Championship` en Laravel. 

### Concepto de la Relación

- Un **User** tiene un único **Championship** (`hasOne`)
- Un **Championship** pertenece a un único **User** (`belongsTo`)
- Cada guerrero (User) tiene un equipamiento único asignado

---

## Archivos del Proyecto

### 1. Modelo User - `app/Models/User.php`

```php
<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email'];

    public function championship()
    {
        return $this->hasOne(Championship::class);
    }
}
```

> **Nota**: El método `hasOne()` define que un usuario tiene un único championship.

---

### 2. Modelo Championship - `app/Models/Championship.php`

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Championship extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'warrior_equipment'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
```

> **Nota**: El método `belongsTo()` define la relación inversa hacia el usuario.

---

### 3. Controlador - `app/Http/Controllers/UserController.php`

```php
<?php
namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        // Eager load Championship to reduce queries
        $users = User::with('championship')->get();
        return view('users', compact('users'));
    }
}
```

> **Nota**: `with('championship')` usa **Eager Loading** para cargar la relación en una sola consulta, evitando el problema N+1.

---

### 4. Rutas - `routes/web.php`

```php
<?php

use App\Http\Controllers\UserController;

Route::get('/users', [UserController::class, 'index']);
```

---

### 5. Migración Championships - `database/migrations/create_championships_table.php`

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('championships', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('warrior_equipment');
            $table->timestamps();

            // Garantiza relación 1:1 - un usuario solo puede tener un championship
            $table->unique('user_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('championships');
    }
};
```

> **Nota**: La restricción `unique('user_id')` garantiza que cada usuario solo pueda tener un championship.

---

### 6. Factory - `database/factories/UserFactory.php`

```php
<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ];
    }
}
```

---

### 7. Seeder - `database/seeders/DatabaseSeeder.php`

```php
<?php
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Championship;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Create 3 users
        $users = User::factory()->count(3)->create();

        // Create one Championship for each User
        foreach ($users as $index => $user) {
            Championship::create([
                'user_id' => $user->id,
                'warrior_equipment' => ['Sword & Shield', 'Bow & Arrows', 'Axe & Armor'][$index]
            ]);
        }
    }
}
```

---

## Vista

### 8. Vista Users - `resources/views/users.blade.php`

```blade
<div class="warriors-grid">
    @foreach($users as $user)
        <div class="warrior-card">
            <div class="warrior-avatar">⚔️</div>
            <div class="warrior-name">{{ $user->name }}</div>
            <div class="equipment-label">Equipment</div>
            @if($user->championship)
                <div class="equipment-value">{{ $user->championship->warrior_equipment }}</div>
            @else
                <div class="equipment-value no-equipment">No equipment assigned</div>
            @endif
        </div>
    @endforeach
</div>
```

> **Nota**: Se accede a la relación con `$user->championship->warrior_equipment` gracias al Eager Loading.

---

## Diagrama de la Relación

```
┌──────────────┐         ┌──────────────────┐
│    users     │         │  championships   │
├──────────────┤         ├──────────────────┤
│ id (PK)      │◄────────┤ user_id (FK, UQ) │
│ name         │   1:1   │ id (PK)          │
│ email        │         │ warrior_equipment│
│ ...          │         │ timestamps       │
└──────────────┘         └──────────────────┘
```

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

- **Lista de guerreros**: `http://127.0.0.1:8000/users`
