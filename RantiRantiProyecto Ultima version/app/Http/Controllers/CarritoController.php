<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\CarritoResource;
use Illuminate\Support\Facades\Auth;

class CarritoController extends Controller
{
    public function verificar()
    {
        $validado=true;
        if(Auth::user()==null)
            $validado=false;
        return CarritoResource::collection(array(['valido'=>$validado]))[0];
    }
}
