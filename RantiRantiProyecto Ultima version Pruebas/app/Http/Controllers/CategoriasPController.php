<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CategoriaProducto;
class CategoriasPController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoriasp=CategoriaProducto::all();
        return view('CRUD.CategoriaProductos.Index',compact('categoriasp'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('CRUD.CategoriaProductos.Insertar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categoriasp=new CategoriaProducto();
        if($file=$request->file('fototipoprod'))
        {
            $nombre=$file->getClientOriginalName();
            $file->move(public_path().'/imagestipoprod/',$nombre);
            $categoriasp->fototipoprod=$nombre;
        }
        $categoriasp->idtipoprod=$request->idtipoprod;
        $categoriasp->nombretipoprod=$request->nombretipoprod;
        $categoriasp->save();
        $categoriasp=CategoriaProducto::all();
        return view('CRUD.CategoriaProductos.Index',compact('categoriasp'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categoriasp=CategoriaProducto::find($id);
        return view('CRUD.CategoriaProductos.Editar',compact('categoriasp'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $categoriasp=CategoriaProducto::find($id);
        $categoriasp->fill($request->all());
        if($file=$request->file('fototipoprod'))
        {
            $nombre=$file->getClientOriginalName();
            $file->move(public_path().'/imagestipoprod/',$nombre);
            $categoriasp->fototipoprod=$nombre;
        }
        $categoriasp->save();
        $categoriasp=CategoriaProducto::all();
        return view('CRUD.CategoriaProductos.Index',compact('categoriasp'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoriasp=CategoriaProducto::find($id);
        $categoriasp->delete();
        return back()->with('info','producto eliminado correctamente');
    }
}
