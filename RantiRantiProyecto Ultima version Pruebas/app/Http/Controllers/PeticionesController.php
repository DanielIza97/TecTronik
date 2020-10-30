<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CategoriaProducto;
use App\CategoriaReceta;
use App\Producto;
use App\Receta;
class PeticionesController extends Controller
{
    //
    public function index_cate(){
        $categoriasp=CategoriaProducto::orderBy('nombretipoprod','asc')->get();
        $categoriasr=CategoriaReceta::orderBy('nombretiporeceta','asc')->get();
        return view('index',compact('categoriasr','categoriasp'));
    }
    public function show($request){
        $categoriasp=CategoriaProducto::orderBy('nombretipoprod','asc')->get();
        $categoriasr=CategoriaReceta::orderBy('nombretiporeceta','asc')->get();
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
        return view("unidad",compact('respuesta','categoria','categoriasr','categoriasp'));
    }
    public function showdetalle($request){
        $categoriasp=CategoriaProducto::orderBy('nombretipoprod','asc')->get();
        $categoriasr=CategoriaReceta::orderBy('nombretiporeceta','asc')->get();
        $producto=Producto::where('nombreproducto',$request)->get();
        $respuesta=[];
        if(count($producto)>0)
        {
            $categoria='producto';
            return view('detalles',compact('producto','categoria','categoriasr','categoriasp'));
        }
        else{
            $receta=Receta::where('nombrereceta',$request)->get();
            //$receta=Receta::find('R-001');
            $ingredientes=$receta[0]->productos->all();
            $categoria='receta';
            return view('detalles',compact('receta','categoria','ingredientes','categoriasp','categoriasr'));
        }
    }
}
