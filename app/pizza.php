<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pizza extends Model
{
    protected $primaryKey = 'pizza_id';
    protected $fillable = ["tipopizza_id","pizza_nombre","pizza_precio", "pizza_descripcion", "pizza_img"]; 
}
