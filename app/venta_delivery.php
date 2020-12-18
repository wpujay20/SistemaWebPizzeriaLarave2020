<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class venta_delivery extends Model
{
    protected $primaryKey = 'ventadelivery_id';
    protected $fillable = ["ventadelivery_id","lugarentrega_id","usuario_id","personalentrega_id", "vnt_monto_final", "vnt_estado"];
}
