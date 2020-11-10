<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriaReceta extends Model
{
    protected $primaryKey='idtiporeceta';
    protected $fillable =['nombretiporeceta','fototiporece',];
    public $incrementing = false;
    public $timestamps = false;
    public function receta(){
        return $this->hasMany(Receta::class,'idtiporeceta');
    }
}
