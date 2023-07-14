<?php

namespace App\Http\Controllers;

use App\Models\typeColor;
use Illuminate\Http\Request;

class TypeColorController extends Controller
{
    public function getTypeColor()
    {
        Return response()->json(tColor::all(),200);
    }

    public function getTypeColorById($id)
    {
        $tColor = tColor::find($id);
        
    }
}
