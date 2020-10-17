<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class InformacionCliente extends Model
{
    //protected $table = 'infomracion_cliente';
    protected $primaryKey='idcedulacliente';
    protected $fillable =['idcedulacliente','user_id','telefonocliente','nombrecliente',];
    public $incrementing = false;
    public $timestamps = false;
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function direcciones(){
        return $this->hasMany(Direccion::class,'idcedulacliente');
    }
}
