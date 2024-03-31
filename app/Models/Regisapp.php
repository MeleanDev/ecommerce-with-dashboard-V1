<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regisapp extends Model
{
    use HasFactory;

    protected $fillable =[ // Se evita que el usuario pueda guardar datos
        'usuario',
        'accion',
        'last_login',
    ];
}
