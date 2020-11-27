<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\InformacionCliente;
use App\Http\Resources\InformacionResource;
use App\Http\Resources\DireccionResource;
use App\Direccion;
use Illuminate\Support\Facades\Auth;

class InformacionController extends Controller
{
    public function __construct()
    {
       $this->middleware('cliente');
    }
    public function perfil()
    {
        return InformacionResource::collection(InformacionCliente::where('idcedulacliente',Auth::user()->idcedulacliente)->get())->all()[0];
    }
    public function direcciones()
    {
        return DireccionResource::collection(Direccion::where('idcedulacliente',Auth::user()->idcedulacliente)->get());
    }
    public function informacion($nombre)
    {
        $cedula=InformacionCliente::where('nombrecliente',$nombre)->get()[0]->idcedulacliente;
        return view('informacion',compact('nombre','cedula'));
    }
}
