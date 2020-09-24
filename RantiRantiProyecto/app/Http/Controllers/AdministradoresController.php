<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Administrador;

class AdministradoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $administrador=Administrador::all();
        return view('CRUD.Administradoresview.Index',compact('administrador'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('CRUD.Administradoresview.Insertar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $administrador=new Administrador();
        $c1=$request->all();
        if($file=$request->file('imagenadministrador'))
        {
            $nombre=time().$file->getClientOriginalName();
            $file->move(public_path().'/imagesadmi/',$nombre);
            $administrador->imagenadministrador=$nombre;
        }
        $administrador->idcedulaadministrador=$request->idcedulaadministrador;
        $administrador->nombreadministrador=$request->nombreadministrador;
        $administrador->cargoadministrador=$request->cargoadministrador;
        $administrador->telefonoadministrador=$request->telefonoadministrador;
        $administrador->correoadministrador=$request->correoadministrador;
        
        $administrador->save();
        $administrador=Administrador::all();
        return view('CRUD.Administradoresview.Index',compact('administrador'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idcedulaadministrador)
    {
        $administrador=Administrador::find($idcedulaadministrador);
        return view('CRUD.Administradoresview.Editar',compact('administrador'));
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
        $administrador=Administrador::find($id);
        $administrador->fill($request->all());
        if($file=$request->file('imagenadministrador'))
        {
            $nombre=time().$file->getClientOriginalName();
            $file->move(public_path().'/images/',$nombre);
            $administrador->imagenadministrador=$nombre;
        }
        $administrador->save();
        $administrador=Administrador::all();
        return back()->with('mensaje','Actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $administrador=administrador::find($id);
        $administrador->delete();
        return back()->with('info','administrador eliminado correctamente');
    }
}
