<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $primaryKey='idproducto';
    protected $fillable =['idproducto','nombreproducto','tipoproducto','cantidadproducto','precioproducto','imagenproducto','tamanoproducto'];
    public $incrementing = false;
    public $timestamps = false;
    public function recetas(){
        return $this->belongsToMany(Receta::class,'recetaxproductos', 'idproducto', 'idreceta');
}
}
