<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class persona extends Model
{
    protected $primaryKey = 'persona_id';
    protected $fillable = ["per_nombres","per_apellidos", "per_dni", "per_telefono"];

}
