<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $primaryKey='idproducto';
    protected $fillable =['idproducto','nombreproducto','tipoproducto','cantidadproducto','precioproducto','imagenproducto'];
    public $incrementing = false;
    public $timestamps = false;
}
