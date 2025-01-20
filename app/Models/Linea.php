<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Linea extends Model
{
    use HasFactory;

    protected $fillable = [
        'todo',
        'index',
        'kitchen_id',
        'user_id',
        'prog',
        'prog_name',
        'data_inizio',
        'data_fine'
    ];
}
