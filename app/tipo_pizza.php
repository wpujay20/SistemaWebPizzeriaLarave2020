<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tipo_pizza extends Model
{
    protected $primaryKey = 'tipopizza_id';
    protected $fillable = ["tpi_nombre","tpi_tamano","tpi_descripcion"]; 
}
