<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $primaryKey='idcedulacliente';
    protected $fillable =['idcedulacliente','telefonocliente','nombrecliente','correocliente','imagencliente'];
    public $incrementing = false;
    public $timestamps = false;
}
