<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'stock',
        'description',
        'image',
        'author_id',
        'size_id',
        'type_clothes_id',
        // 'type_color_id',
    ];


    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function size(){
        return $this->belongsTo('App\Models\size');
    }

    public function type_Clothes(){
        return $this->belongsTo('App\Models\type_Clothes');
    }

    public function type_Color(){
        return $this->belongsTo('App\Models\type_Color');
    }
}
