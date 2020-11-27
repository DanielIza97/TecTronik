<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\CarritoResource;
use Illuminate\Support\Facades\Auth;

class CarritoController extends Controller
{
    public function carrito(){
        return view('carrito');
    }
    public function verificar()
    {
        $validado=true;
        if(Auth::user()==null)
            $validado=false;
        return CarritoResource::collection(array(['valido'=>$validado]))[0];
    }
    public function agregar(Request $request,$cantidad)
    {
        session_start();
        if($cantidad=='borrar')
        {
            
            if(count($request->all())>0)
            {
                $_SESSION['carrito']=$request->all();
                return CarritoResource::collection($_SESSION['carrito']);
            }
            else
            {
                session_destroy();
                return CarritoResource::collection([]);
            }
        }
        if(isset($_SESSION['carrito']))
        {
            $agregado=$_SESSION['carrito'];
            $index=0;
            for($x=0;$x<count($agregado);$x++)
            {
                if($agregado[$x]['id']==$request->idproducto||$agregado[$x]['id']==$request->id){
                    $index=$x;
                }
            }
            if($agregado[$index]['id']==$request->idproducto||$agregado[$index]['id']==$request->id){
                $agregado[$index]['cantidad']=$cantidad;
                $_SESSION['carrito']=$agregado;
            }
            else{
                $nuevoarreglo=array(
                    'id'=>$request->idproducto,
                    'imagen'=>$request->imagenproducto,
                    'nombre'=>$request->nombreproducto,
                    'precio'=>$request->precioproducto,
                    'detalle'=>$request->detalleproducto,
                    'cantidad'=>$cantidad,
                    'medida'=>$request->idmedida,
                );
                array_push($agregado,$nuevoarreglo);
                $_SESSION['carrito']=$agregado;
            }
        }else
        {
            $arreglo[]=array(
                'id'=>$request->idproducto,
                'imagen'=>$request->imagenproducto,
                'nombre'=>$request->nombreproducto,
                'precio'=>$request->precioproducto,
                'detalle'=>$request->detalleproducto,
                'cantidad'=>$cantidad,
                'medida'=>$request->idmedida,
            );
            $_SESSION['carrito']=$arreglo;
        }
        return CarritoResource::collection($_SESSION['carrito']);
    }
    public function borrarcarrito($accion){
        session_start();
        if(isset($_SESSION['carrito']))
            if($accion=='items')
            {
                if(Auth::user()==null)
                {
                    session_destroy();
                    return CarritoResource::collection([]);
                }
                return CarritoResource::collection(array(['items'=>count($_SESSION['carrito'])]))[0];
            }
            else{
                if($accion=='mostrar')
                    return CarritoResource::collection($_SESSION['carrito']);
            }
        else
            return CarritoResource::collection(array(['items'=>0]))[0];
    }
}
