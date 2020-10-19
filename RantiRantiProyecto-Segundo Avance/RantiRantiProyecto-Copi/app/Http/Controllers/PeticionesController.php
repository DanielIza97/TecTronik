<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CategoriaProducto;
use App\CategoriaReceta;

class PeticionesController extends Controller
{
    //
    public function index_cate(){
        $categoriasp=CategoriaProducto::all();
        $categoriasr=CategoriaReceta::all();
        return view('index',compact('categoriasr','categoriasp'));
    }
    public function show(   $request){
        $respuesta=[];
        $categoria='';
        $categoria=CategoriaProducto::where('nombretipoprod',$request)->get()->all();
        if(count($categoria)>0)
        {
            $respuesta= $categoria[0]->producto;
            $categoria='Productos';
        }
        else
        {
            $categoria=CategoriaReceta::where('nombretiporeceta',$request)->get()->all();
            if(count($categoria)>0)
            {
                $respuesta= $categoria[0]->receta;    
                $categoria='Recetas';
            }
        }
        return view("unidad",compact('respuesta','categoria'));
    }
}
