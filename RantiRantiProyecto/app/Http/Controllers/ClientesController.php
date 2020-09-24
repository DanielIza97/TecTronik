<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes=Cliente::all();
        return view('CRUD.Clientesview.Index',compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('CRUD.Clientesview.Insertar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cliente=new Cliente();
        $c1=$request->all();
        if($file=$request->file('imagencliente'))
        {
            $nombre=time().$file->getClientOriginalName();
            $file->move(public_path().'/images/',$nombre);
            $cliente->imagencliente=$nombre;
        }
        $cliente->idcedulacliente=$request->idcedulacliente;
        $cliente->telefonocliente=$request->telefonocliente;
        $cliente->nombrecliente=$request->nombrecliente;
        $cliente->correocliente=$request->correocliente;
        
        $cliente->save();
        $clientes=Cliente::all();
        return view('CRUD.Clientesview.Index',compact('clientes'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idcedulacliente)
    {
        $cliente=Cliente::find($idcedulacliente);
        return view('CRUD.Clientesview.Editar',compact('cliente'));
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
        $cliente=Cliente::find($id);
        $cliente->fill($request->all());
        if($file=$request->file('imagencliente'))
        {
            $nombre=time().$file->getClientOriginalName();
            $file->move(public_path().'/images/',$nombre);
            $cliente->imagencliente=$nombre;
        }
        $cliente->save();
        $clientes=Cliente::all();
        return view('CRUD.Clientesview.Index',compact('clientes'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente=Cliente::find($id);
        $cliente->delete();
        return back()->with('info','cliente eliminado correctamente');
    }
}

