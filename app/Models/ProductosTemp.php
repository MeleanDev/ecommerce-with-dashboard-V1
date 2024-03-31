<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductosTemp extends Model
{
    use HasFactory;

    protected $fillable = [
        'precio',
        'cantidad',
        'nombre',
    ];
}
