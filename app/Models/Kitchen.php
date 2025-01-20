<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kitchen extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'indirizzo',
        'citta',
        'cap',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function suppliers() {
        return $this->belongsToMany(Supplier::class, 'kitchen_suppliers');
    }
}
