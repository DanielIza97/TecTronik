<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Administrador extends Model
{
    protected $primaryKey='idcedulaadministrador';
    protected $fillable =['idcedulaadministrador','nombreadministrador','cargoadministrador','telefonoadministrador','correoadministrador','imagenadministrador',];
    public $incrementing = false;
    public $timestamps = false;
}
