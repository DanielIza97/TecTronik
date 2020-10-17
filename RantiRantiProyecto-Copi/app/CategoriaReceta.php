<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriaReceta extends Model
{
    protected $primaryKey='idtiporeceta';
    protected $fillable =['nombretiporeceta',];
    public $incrementing = false;
    public $timestamps = false;
}
