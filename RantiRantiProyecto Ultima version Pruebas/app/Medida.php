<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medida extends Model
{
    protected $primaryKey='idmedida';
    protected $fillable =['nombremedida'];
    public $incrementing = false;
    public $timestamps = false;
    public function producto(){
        return $this->hasMany(Producto::class,'idmedida');
    }
}
