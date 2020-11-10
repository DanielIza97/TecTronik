<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CategoriaProducto;
use App\CategoriaReceta;
use App\Producto;
use App\Receta;
use App\Http\Resources\CategoriaProductoResource;
use App\Http\Resources\CategoriaRecetaResource;
use App\Http\Resources\DetalleResource;

class PeticionesController extends Controller
{
    public function indexproducto(){
        return CategoriaProductoResource::collection(CategoriaProducto::orderBy('nombretipoprod','asc')->get());
    }
    public function indexrecetas(){
        return CategoriaRecetaResource::collection(CategoriaReceta::orderBy('nombretiporeceta','asc')->get());
    }
    public function show($request){
        $categoria='';
        $categoria=CategoriaProducto::where('nombretipoprod',$request)->get()->all();
        $respuesta=[];
        if(count($categoria)>0)
        {
            $respuesta= $categoria[0]->producto()->orderBy('nombreproducto','asc')->get();
            $categoria='Productos';
        }
        else
        {
            $categoria=CategoriaReceta::where('nombretiporeceta',$request)->get()->all();
            if(count($categoria)>0)
            {
                $respuesta= $categoria[0]->receta()->orderBy('nombrereceta','asc')->get();    
                $categoria='Recetas';
            }
        }
        return view("unidad",compact('respuesta','categoria','request'));
    }
    public function showviewdetalle($tipo,$request){
        return view('detalles',compact('tipo','request'));
    }
    public function showdetalleproducto($request){
        $producto=Producto::where('nombreproducto',$request)->get();
        return DetalleResource::collection($producto)->all()[0];
    }
    public function showdetallereceta($request){
        $receta=Receta::where('nombrereceta',$request)->get();
        return DetalleResource::collection($receta)->all()[0];//DetalleResource::collection($receta)->all()[0]->productos->all()[1]->pivot;
    }
    public function showdetalleingredientes($request){
        $receta=Receta::where('nombrereceta',$request)->get()[0]->productos;
        return DetalleResource::collection($receta);//DetalleResource::collection($receta)->all()[0]->productos->all()[1]->pivot;
    }
}
