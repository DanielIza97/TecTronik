<?php

namespace App\Http\Controllers\CrudControllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Producto;
use App\CategoriaProducto;

class ProductosController extends Controller
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
    public function index()
    {
        $producto=Producto::orderBy('nombreproducto','asc')->get();
        return view('CRUD.Productosview.Index',compact('producto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cateprod=CategoriaProducto::all();
        return view('CRUD.Productosview.Insertar',compact('cateprod'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        date_default_timezone_set ("America/Guayaquil");
        $nombre='';
        if($file=$request->file('imagenproducto'))
        {
            $nombre=$file->getClientOriginalName();
            $file->move(public_path().'/imagesproducto/',$nombre);
        }
        Producto::create([
            'idproducto'=>$request->idproducto,
            'imagenproducto'=>$nombre,
            'nombreproducto' => $request->nombreproducto,
            'detalle' => $request->detalle,
            'idtipoprod' => $request->idtipoprod,
            'cantidadproducto'=>$request->cantidadproducto,
            'precioproducto'=>$request->precioproducto,
            'tamanoproducto'=>$request->tamanoproducto,
            'idmedida'=>$request->idmedida,
            'created_at'=>date("Y-m-d"),
            'updated_at'=>date("Y-m-d"),
        ]);
        $producto=Producto::all();
        return view('CRUD.Productosview.Index',compact('producto'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idproducto)
    {
        $cateprod=CategoriaProducto::all();
        $producto=Producto::find($idproducto);
        return view('CRUD.Productosview.Editar',compact('producto','cateprod'));
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
            $nombre=$file->getClientOriginalName();
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
