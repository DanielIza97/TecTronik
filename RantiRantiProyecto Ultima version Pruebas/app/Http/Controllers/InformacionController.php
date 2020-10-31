<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InformacionController extends Controller
{
    public function __construct()
    {
        $this->middleware('cliente');
    }
    public function perfil($idcliente)
    {
        return view('informacion');
    }
}
