<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    protected $primaryKey='iddireccion';
    protected $fillable =['idcedulacliente','calleprincipal','callesecundaria','imagendireccion','numerodecasa'];
    public $incrementing = false;
    public $timestamps = false;
    
}
