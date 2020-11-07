<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $primaryKey='idproducto';
    protected $fillable =['idproducto','detalle','idmedida','nombreproducto','idtipoprod','cantidadproducto','precioproducto','imagenproducto','tamanoproducto','created_at','updated_at'];
    public $incrementing = false;
    public $timestamps = false;
    public function recetas(){
        return $this->belongsToMany(Receta::class,'recetaxproductos', 'idproducto', 'idreceta')->withPivot('cantidad');
    }
    public function categoriaprod(){
        return $this->belongsTo(CategoriaProducto::class,'idtipoprod');
    }
    public function medida(){
        return $this->belongsTo(Medida::class,'idmedida');
    }
}
