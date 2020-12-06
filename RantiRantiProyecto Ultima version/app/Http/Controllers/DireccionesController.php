<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\InformacionCliente;
use App\Direccion;
use App\Pedido;
use App\Producto;
use App\Http\Resources\DetalleResource;
use Illuminate\Support\Facades\Auth;

class DireccionesController extends Controller
{
    public function index($id){
        $clientes=InformacionCliente::find($id);
        $direcciones=$clientes->direcciones;
        return view('CRUD.Direccionesview.index',compact('direcciones'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$crear){
        session_start();
        date_default_timezone_set ("America/Guayaquil");
        if($request->imagendireccion==null)
            $reques->imagendireccion='casa.png';
        Direccion::updateOrCreate(
            ['iddireccion' => $request->iddireccion],
            [
                'idcedulacliente'=> $request->idcedulacliente,
                'calleprincipal'=> $request->calleprincipal,
                'callesecundaria'=> $request->callesecundaria,
                'imagendireccion'=> $request->imagendireccion,
                'numerodecasa'=> $request->numerodecasa,
                'sector'=> $request->sector,
                'ciudad'=> $request->ciudad,
                'provincia' => $request->provincia,
                'telefonocliente'=> $request->telefonocliente,
                'estado'=>true,
            ]
        );
        $pedido=new Pedido();
        $pedido->idpedido=Auth::user()->idcedulacliente.'_Compra_'.(count(Pedido::where('idcedulacliente',Auth::user()->idcedulacliente)->get())+1);
        $pedido->idcedulacliente=Auth::user()->idcedulacliente;
        $pedido->fechapedido=date("Y-m-d");
        $pedido->subtotal=$request->subtotal;
        $pedido->iva=$request->iva;
        $pedido->totalpag=$request->totalpag;
        $pedido->iddireccion=$request->iddireccion;
        $pedido->estado='pendiente';
        $pedido->save();
        $productos=$_SESSION['carrito'];
        $pxp=Pedido::findOrFail(Auth::user()->idcedulacliente.'_Compra_'.(count(Pedido::where('idcedulacliente',Auth::user()->idcedulacliente)->get())));
        foreach($productos as $producto){
            $pxp->productos()->detach($producto['id']);
            $pxp->productos()->attach($producto['id'],['cantidad' => $producto['cantidad']]);
        }
        session_destroy();
    }
    public function delete($index)
    {
        Direccion::updateOrCreate(
            ['iddireccion' => $index],
            [
                'estado'=>false,
            ]
        );
    }
}
