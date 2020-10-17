<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $primaryKey='idpedido';
    protected $fillable =['fechapedido'];
    public $incrementing = false;
    public $timestamps = false;
}
