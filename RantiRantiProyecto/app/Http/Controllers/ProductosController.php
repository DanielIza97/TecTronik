<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $producto=Producto::all();
        return view('CRUD.Productosview.Index',compact('producto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('CRUD.Productosview.Insertar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $producto=new Producto();
        $c1=$request->all();
        if($file=$request->file('imagenproducto'))
        {
            $nombre=time().$file->getClientOriginalName();
            $file->move(public_path().'/imagesproducto/',$nombre);
            $producto->imagenproducto=$nombre;
        }
        $producto->idproducto=$request->idproducto;
        $producto->nombreproducto=$request->nombreproducto;
        $producto->tipoproducto=$request->tipoproducto;
        $producto->cantidadproducto=$request->cantidadproducto;
        $producto->precioproducto=$request->precioproducto;
        
        $producto->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idproducto)
    {
        $producto=Producto::find($idproducto);
        return view('CRUD.Productosview.Editar',compact('producto'));
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
        $producto=Producto::find($id);
        $producto->fill($request->all());
        if($file=$request->file('imagenproducto'))
        {
            $nombre=time().$file->getClientOriginalName();
            $file->move(public_path().'/imagesproducto/',$nombre);
            $producto->imagenproducto=$nombre;
        }
        $producto->save();
        $producto=Producto::all();
        return view('CRUD.Productosview.Index',compact('producto'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto=Producto::find($id);
        $producto->delete();
        return back()->with('info','producto eliminado correctamente');
    }
}
