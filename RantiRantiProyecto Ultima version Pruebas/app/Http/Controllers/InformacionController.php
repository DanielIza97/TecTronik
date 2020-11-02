<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\InformacionCliente;
use App\Http\Resources\InformacionResource;

class InformacionController extends Controller
{
    public function __construct()
    {
       $this->middleware('cliente');
    }
    public function perfil($idcedulacliente)
    {
        return InformacionResource::collection(InformacionCliente::where('user_id',$idcedulacliente)->get())->all()[0];
    }
    public function informacion($idcedulacliente)
    {
        return view('informacion',compact('idcedulacliente'));
    }
}
