<?php

namespace App;

class personal_entrega extends Entity
{

    protected $primaryKey = 'personalentrega_id';
    protected $fillable = ["personalentrega_id","peen_nombres","peen_apellidos", "peen_telefono", "estado_id"]; 

    public function estado()
    {
        return $this->hasOne(estado_personal::getClass(),'estadopersonal_id', 'estado_id');
    }
}
