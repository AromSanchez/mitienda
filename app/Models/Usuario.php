<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $fillable = [
        'name',
        'email',
    ];

    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'usuario_id'); // usa la clave foránea correcta si es 'usuario_id'
    }
}
