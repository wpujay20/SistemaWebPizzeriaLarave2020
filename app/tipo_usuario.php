<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tipo_usuario extends Model
{
    //
    protected $table = 'tipo_usuarios';
    protected $primaryKey = 'tipousu_id';
    protected $fillable = ["tipousu_id","tipo_nombre","tipo_descripcion"];

}
