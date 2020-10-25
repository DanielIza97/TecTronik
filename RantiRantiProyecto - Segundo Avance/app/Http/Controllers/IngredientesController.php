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
        $producto=Medida::find('M1');
        $libreados=$producto->producto;
        $produc=$receta->productos->pluck('nombreproducto');
        return view('CRUD.Ingredientesview.Index',compact('receta','libreados','produc'));
    }
    public function create_recetas(Request $request){
        $receta=Receta::findOrFail($request->idreceta);
        $producto=Producto::findOrFail($request->idproducto);
        $medida=Medida::find('M1');
        $producto->recetas()->detach($request->idreceta);
        $producto->recetas()->attach($request->idreceta,['cantidad' => $request->cantidad]);
        $libreados=$medida->producto;
        $produc=$receta->productos->pluck('nombreproducto');
        return view('CRUD.Ingredientesview.Index',compact('receta','libreados','produc'));
    }
    
}
/**/