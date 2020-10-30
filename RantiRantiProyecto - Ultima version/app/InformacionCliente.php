<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class InformacionCliente extends Model
{
    //protected $table = 'infomracion_cliente';
    protected $primaryKey='idcedulacliente';
    protected $fillable =['idcedulacliente','user_id','telefonocliente','nombrecliente','generocliente'];
    public $incrementing = false;
    public $timestamps = false;
    
    public function direcciones(){
        return $this->hasMany(Direccion::class,'idcedulacliente');
    }
}
