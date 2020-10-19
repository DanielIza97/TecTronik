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
        InformacionCliente::create([
            'idcedulacliente'=>$data['idcedulacliente'],
            'telefonocliente' =>$data['telefonocliente'],
            'nombrecliente' => $data['nombrecliente'],
        ]);
        User::create([
            'idcedulacliente'=>$data['idcedulacliente'],
            'name' => $data['name'],
            'email' => $data['email'],
            'rol' => 'cliente',
            'fotouser' => $data['fotouser'],
            'password' => Hash::make($data['password']),
        ]);
        $user=User::orderby('id','desc')->first();
        InformacionCliente::updateOrCreate(
            ['idcedulacliente'=>$data['idcedulacliente']],
            ['user_id'=>$user->id]);
        return $user;
    }
}