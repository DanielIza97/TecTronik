<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Receta;
use App\Producto;
use App\Medida;
class IngredientesController extends Controller
{
    public function index_recetas($idreceta){
        $receta=Receta::find($idreceta);
        $productos=Producto::all();
        $produc=$receta->productos->pluck('nombreproducto');
        return view('CRUD.Ingredientesview.Index',compact('receta','productos','produc'));
    }
    public function create_recetas(Request $request){
        $receta=Receta::findOrFail($request->idreceta);
        $productos=Producto::findOrFail($request->idproducto);
        $productos->recetas()->detach($request->idreceta);
        $productos->recetas()->attach($request->idreceta,['cantidad' => $request->cantidad]);
        $produc=$receta->productos->pluck('nombreproducto');
        return view('CRUD.Ingredientesview.Index',compact('receta','productos','produc'));
    }
    
}
/**/