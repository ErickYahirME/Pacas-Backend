<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class address extends Model
{
    use HasFactory;

    protected $fillable = [
        'calle',
        'numExt',
        'numInt',
        'colonia',
        'municipio',
        'estado',
        'pais',
        'codigoPostal',
        'idUser',
        'nombreCompleto',
    ];
}
