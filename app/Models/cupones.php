<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cupones extends Model
{
    use HasFactory;
    protected $fillable = [
        'codigo',
        'descuento',
        'fecha_inicio',
        'fecha_fin',
        'estado'
    ];

}
