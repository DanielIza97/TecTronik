<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $primaryKey='idpedido';
    protected $fillable =['idpedido','fechapedido','idcedulacliente','subtotal','iva','totalpag','iddireccion','estado'];
    public $incrementing = false;
    public $timestamps = false;
    public function direcciones(){
        return $this->belongsTo(Direccion::class,'iddireccion');
    }
    public function cliente(){
        return $this->belongsTo(InformacionCliente::class,'idcedulacliente');
    }
    public function productos(){
        return $this->belongsToMany(Producto::class,'productoxpedidos','idpedido', 'idproducto')->withPivot('cantidad');
    }
}
