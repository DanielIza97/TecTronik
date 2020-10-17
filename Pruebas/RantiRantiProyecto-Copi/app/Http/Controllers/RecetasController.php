<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Receta;
use App\Producto;

class RecetasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $receta=Receta::all();
        return view('CRUD.Recetasview.Index',compact('receta'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('CRUD.Recetasview.Insertar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $receta=new Receta();
        $c1=$request->all();
        if($file=$request->file('imagenreceta'))
        {
            $nombre=time().$file->getClientOriginalName();
            $file->move(public_path().'/imagesrecetas/',$nombre);
            $receta->imagenreceta=$nombre;
        }
        $receta->idreceta=$request->idreceta;
        $receta->nombrereceta=$request->nombrereceta;
        $receta->descripcionreceta=$request->descripcionreceta;
        
        $receta->save();
        $receta=Receta::find($request->idreceta);
        $producto=Producto::all();
        $produc=$receta->productos->pluck('nombreproducto');
        return view('CRUD.Ingredientesview.Index',compact('receta','producto','produc'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idreceta)
    {
        $receta=Receta::find($idreceta);
        return view('CRUD.Recetasview.Editar',compact('receta'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $receta=Receta::find($id);
        $receta->fill($request->all());
        if($file=$request->file('imagenreceta'))
        {
            $nombre=time().$file->getClientOriginalName();
            $file->move(public_path().'/imagesreceta/',$nombre);
            $receta->imagenreceta=$nombre;
        }
        $receta->save();
        $receta=Receta::all();
        return view('CRUD.Recetasview.Index',compact('receta'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $receta=Receta::find($id);
        $receta->delete();
        return back()->with('info','receta eliminado correctamente');
    }
}