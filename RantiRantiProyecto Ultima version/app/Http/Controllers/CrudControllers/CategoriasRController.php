<?php

namespace App\Http\Controllers\CrudControllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CategoriaReceta;
class CategoriasRController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoriasr=CategoriaReceta::all();
        return view('CRUD.CategoriaRecetas.Index',compact('categoriasr'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('CRUD.CategoriaRecetas.Insertar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categoriasr=new CategoriaReceta();
        if($file=$request->file('fototiporece'))
        {
            $nombre=time().$file->getClientOriginalName();
            $file->move(public_path().'/imagestiporeceta/',$nombre);
            $categoriasr->fototiporece=$nombre;
        }
        $categoriasr->idtiporeceta=$request->idtiporeceta;
        $categoriasr->nombretiporeceta=$request->nombretiporeceta;
        
        $categoriasr->save();
        $categoriasr=CategoriaReceta::all();
        return view('CRUD.CategoriaRecetas.Index',compact('categoriasr'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categoriasr=CategoriaReceta::find($id);
        return view('CRUD.CategoriaRecetas.Editar',compact('categoriasr'));
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
        $categoriasr=CategoriaReceta::find($id);
        $categoriasr->fill($request->all());
        if($file=$request->file('fototiporece'))
        {
            $nombre=time().$file->getClientOriginalName();
            $file->move(public_path().'/imagestiporeceta/',$nombre);
            $categoriasr->fototiporece=$nombre;
        }
        $categoriasr->save();
        $categoriasr=CategoriaReceta::all();
        return view('CRUD.CategoriaRecetas.Index',compact('categoriasr'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoriasr=CategoriaReceta::find($id);
        $categoriasr->delete();
        $categoriasr=CategoriaReceta::all();
        return view('CRUD.CategoriaRecetas.Index',compact('categoriasr'))->with('info','Receta eliminado correctamente');
    }
}
