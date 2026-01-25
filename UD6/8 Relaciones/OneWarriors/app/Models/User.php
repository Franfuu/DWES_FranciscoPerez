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
//TODO: Completar las capturas en el readme One Warriors