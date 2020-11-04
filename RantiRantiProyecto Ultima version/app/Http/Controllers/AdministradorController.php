<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdministradorController extends Controller
{
    public function __construct()
    {
        $this->middleware('admi');
    }
    public function index(){
        return view('Indexmenu');

    }
}
