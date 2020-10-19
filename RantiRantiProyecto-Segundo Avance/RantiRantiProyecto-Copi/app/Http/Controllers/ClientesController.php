<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Direccion;
use App\InformacionCliente;
class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('admi');
    }
    public function index($id)
    {
        $user=User::find($id);
        $informacion=$user->Informacion_Cli;
        return view('CRUD.InformacionClientesview.Index',compact('informacion','id'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('CRUD.InformacionClientesview.Insertar',compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $informacion=new InformacionCliente();
        $direccion=new Direccion();
        $informacion->idcedulacliente=$request->idcedulacliente;
        $informacion->user_id=$request->user_id;
        $informacion->idcedulacliente=$request->idcedulacliente;
        $informacion->telefonocliente=$request->telefonocliente;
        $informacion->nombrecliente=$request->nombrecliente;
        if($file=$request->file('imagendireccion'))
        {
            $nombre=time().$file->getClientOriginalName();
            $file->move(public_path().'/imagesdireccion/',$nombre);
            $direccion->imagendireccion=$nombre;
        }
        $direccion->iddireccion=$request->iddireccion;
        $direccion->idcedulacliente=$request->idcedulacliente;
        $direccion->calleprincipal=$request->calleprincipal;
        $direccion->callesecundaria=$request->callesecundaria;
        $direccion->numerodecasa=$request->numerodecasa;
        $informacion->save();
        $direccion->save();
        User::updateOrCreate(
            ['id'=>$request->user_id],
            ['idcedulacliente'=>$request->idcedulacliente]);
        $informacion=InformacionCliente::find($request->idcedulacliente);
        return view('CRUD.InformacionClientesview.Index',compact('informacion'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idcedulacliente)
    {
        $informacion=InformacionCliente::find($idcedulacliente);
        return view('CRUD.InformacionClientesview.Editar',compact('informacion'));
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
        $informacion=InformacionCliente::find($id);
        $informacion->fill($request->all());
        $informacion->save();
        return view('CRUD.InformacionClientesview.Index',compact('informacion'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $informacion=InformacionCliente::find($id);
        $informacion->delete();
        return back()->with('info','cliente eliminado correctamente');
    }
}

