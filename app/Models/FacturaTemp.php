<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacturaTemp extends Model
{
    use HasFactory;

    protected $fillable = [
        'factura',
        'admin',
        'nombre',
        'apellido',
        'cedula',
        'telefono',
    ];
}
