<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriaProducto extends Model
{
    protected $primaryKey='idtipoprod';
    protected $fillable =['nombretipoprod',];
    public $incrementing = false;
    public $timestamps = false;
    
}
