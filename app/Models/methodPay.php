<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class methodPay extends Model
{
    use HasFactory;

    protected $fillable = [
        'numTarjeta',
        'fechaVencimiento',
        'cvv',
        'price',
        'idUser'
    ];
}
