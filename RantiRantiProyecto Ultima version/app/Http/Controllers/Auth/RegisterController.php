<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\InformacionCliente;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'idcedulacliente' => ['required','numeric','max:9999999999','between:0159999999,2459999999'],
            'telefonocliente' => ['required','numeric','max:9999999999','between:0900000000,0999999999'],
            'fotouser'=>['required'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $nombre='';
        InformacionCliente::create([
            'idcedulacliente'=>$data['idcedulacliente'],
            'telefonocliente' =>$data['telefonocliente'],
            'nombrecliente' => $data['name'].' '.$data['apellido'],
            'generocliente'=>$data['generocliente'],
        ]);
        if($file=$data['fotouser'])
        {
            $nombre=$file->getClientOriginalName();
            $file->move(public_path().'/imagesusers/',$nombre);
        }
        else 
        {
            if($data['generocliente']=='Hombre')
                $nombre='hombre.jpg';
            else
                $nombre='mujer.jpg';

        }
        User::create([
            'idcedulacliente'=>$data['idcedulacliente'],
            'name' => $data['name'].' '.$data['apellido'],
            'email' => $data['email'],
            'rol' => 'cliente',
            'fotouser' => $nombre,
            'password' => Hash::make($data['password']),
        ]);
        $user=User::orderby('id','desc')->first();
        InformacionCliente::updateOrCreate(
            ['idcedulacliente'=>$data['idcedulacliente']],
            ['user_id'=>$user->id]);
        return $user;
    }
}
