<?php

namespace App\Http\Controllers\CrudControllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\InformacionCliente;
use App\Direccion;
class DireccionesController extends Controller
{
    public function index($id){
        $clientes=InformacionCliente::find($id);
        $direcciones=$clientes->direcciones;
        return view('CRUD.Direccionesview.index',compact('direcciones'));
    }
}
