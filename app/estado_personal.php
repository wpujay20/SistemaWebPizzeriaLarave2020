<?php

namespace App;

class estado_personal extends Entity
{
    protected $primaryKey = 'estadopersonal_id';
    protected $fillable = ["nombre_estado"]; 
}
