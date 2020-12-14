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
use App\Http\Resources\CarritoResource;

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
    public function store(Request $request){
        session_start();
        date_default_timezone_set ("America/Guayaquil");
        //dd($currentTime = time());  
        if($request->imagendireccion==null)
            $request->imagendireccion='casa.png';
        $direccion=Direccion::updateOrCreate(
            ['iddireccion' => $request->iddireccion.'-'.Auth::user()->idcedulacliente],
            [
                'idcedulacliente'=> Auth::user()->idcedulacliente,
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
        $pedido->iddireccion=$direccion->iddireccion;
        $pedido->estado='pendiente';
        $pedido->tiempo=$currentTime = time();
        $pedido->cancelar=false;
        $pedido->save();
        /*$productos=$_SESSION['carrito'];
        $pxp=Pedido::findOrFail(Auth::user()->idcedulacliente.'_Compra_'.(count(Pedido::where('idcedulacliente',Auth::user()->idcedulacliente)->get())));
        foreach($productos as $producto){
            $pxp->productos()->detach($producto['id']);
            $pxp->productos()->attach($producto['id'],['cantidad' => $producto['cantidad']]);
        }
        session_destroy();*/
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
    public function cancelarpedido($index)
    {
        Pedido::updateOrCreate(
            ['idpedido' => $index],
            [
                'cancelar'=>true,
            ]
        );
    }
    public function cancelar($tiempo)
    {
        $diff=time()-$tiempo;
        $cancelar=true;
        if($diff>60)
            $cancelar=false;
        return CarritoResource::collection(array(['cancelar'=>$cancelar,'diferencia'=>$diff,'tiempo'=>$tiempo,'catual'=>time()]))[0];
    }
}
