<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

//This relation library is needed for the hasMany relation
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
//TODO: Completar las capturas en el readme One Warriors