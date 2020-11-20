<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class personal_entrega extends Model
{
    
    protected $primaryKey = 'personalentrega_id';
    protected $fillable = ["personalentrega_id","peen_nombres","peen_apellidos", "peen_telefono", "estado_id"]; 


}
