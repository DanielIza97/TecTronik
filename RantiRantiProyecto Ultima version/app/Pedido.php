<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $primaryKey='idpedido';
    protected $fillable =['idpedido','fechapedido','idcedulacliente','subtotal','iva','totalpag','iddireccion'];
    public $incrementing = false;
    public $timestamps = false;
    public function productos(){
        return $this->belongsToMany(Producto::class,'productoxpedidos','idpedido', 'idproducto')->withPivot('cantidad');
}
}
