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