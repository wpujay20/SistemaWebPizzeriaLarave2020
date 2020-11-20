<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class usuario extends Model
{   
    protected $primaryKey = 'usuario_id';
    protected $fillable = ["usuario_id","persona_id","tipousu_id", "usu_correo", "usu_pass", "usu_estado"]; 
}
