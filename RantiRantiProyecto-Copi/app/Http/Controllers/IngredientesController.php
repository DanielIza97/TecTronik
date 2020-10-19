<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Receta;
use App\Producto;
class IngredientesController extends Controller
{
    public function index_recetas($idreceta){
        $receta=Receta::find($idreceta);
        $producto=Producto::all();
        $produc=$receta->productos->pluck('nombreproducto');
        return view('CRUD.Ingredientesview.Index',compact('receta','producto','produc'));
    }
    public function create_recetas(Request $request){
        $receta=Receta::findOrFail($request->idreceta);
        $producto=Producto::findOrFail($request->idproducto);
        $producto->recetas()->sync($request->idreceta);
        $producto=Producto::all();
        $produc=$receta->productos->pluck('nombreproducto');
        return view('CRUD.Ingredientesview.Index',compact('receta','producto','produc'));
    }
    
}
/**/