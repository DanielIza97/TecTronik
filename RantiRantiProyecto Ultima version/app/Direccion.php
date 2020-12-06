<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    protected $primaryKey='iddireccion';
    protected $fillable =['idcedulacliente','calleprincipal','callesecundaria','imagendireccion','numerodecasa','idcedulacliente','provincia','ciudad','sector','telefonocliente','iddireccion','estado'];
    public $incrementing = false;
    public $timestamps = false;
    public function pedidos(){
        return $this->hasMany(Pedido::class,'iddireccion');
    }
    public function informacion(){
        return $this->belongsTo(InformacionCliente::class,'idcedulacliente');
    }
}
