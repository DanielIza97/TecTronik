<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriaProducto extends Model
{
    protected $primaryKey='idtipoprod';
    protected $fillable =['nombretipoprod','fototipoprod',];
    public $incrementing = false;
    public $timestamps = false;
    public function producto(){
        return $this->hasMany(Producto::class,'idtipoprod');
    }
}
