<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    protected $primaryKey='idreceta';
    protected $fillable =['idreceta','nombrereceta','descripcionreceta','imagenreceta'];
    public $incrementing = false;
    public $timestamps = false;
    public function productos(){
            return $this->belongsToMany(Producto::class,'recetaxproductos','idreceta', 'idproducto');
    }
    
}
