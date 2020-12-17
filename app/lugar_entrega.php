<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class lugar_entrega extends Model
{
    //
    protected $table = 'lugar_entregas';
    protected $primaryKey = 'lugarentrega_id';
    protected $fillable = ["lugarentrega_id ","lugar_direccion","lugar_distrito"];

}
