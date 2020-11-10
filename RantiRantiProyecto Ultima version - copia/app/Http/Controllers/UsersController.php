<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
class UsersController extends Controller
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
        $users=User::all();
     //   return view('CRUD.Usersview.Index',compact('users'));
        return view('CRUD.Usersview.Index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('CRUD.Usersview.Insertar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*if($file=$request->file('fotouser'))
        {
            $nombre=time().$file->getClientOriginalName();
            $file->move(public_path().'/imagesusers/',$nombre);
            $user->fotouser=$nombre;
        }
        $user->id=$request->id;
        $user->name=
        $user->email=;
        $user->rol=;
        $user->password=;*/
        $nombre='';
        if($file=$request->file('fotouser'))
        {
            $nombre=$file->getClientOriginalName();
            $file->move(public_path().'/imagesusers/',$nombre);
        
        }
        else
            $nombre='hombre.jpg';
        User::create([
            'fotouser'=>$nombre,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'rol'=>$request->rol,
        ]);
        $users=User::all();
     //   return view('CRUD.Usersview.Index',compact('users'));
        return view('CRUD.Usersview.Index',compact('users'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users=User::find($id);
        return view('CRUD.Usersview.Editar',compact('users'));
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
        $user=User::find($id);
        $user->fill($request->all());
        $nombre='';
        if($file=$request->file('fotouser'))
        {
            $nombre=$file->getClientOriginalName();
            $file->move(public_path().'/imagesusers/',$nombre);
        }
        User::updateOrCreate(
            ['id'=>$id],
            ['name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'rol'=>$request->rol,
            'fotouser'=>$nombre,
            ]);
        $users=User::all();
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
        $users=User::find($id);
        $users->delete();
        return back()->with('info','cliente eliminado correctamente');
    }
}
