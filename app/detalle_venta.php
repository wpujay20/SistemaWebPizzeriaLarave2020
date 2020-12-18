<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detalle_venta extends Model
{
    protected $primaryKey = 'detalleventa_id';
    protected $fillable = ["detalleventa_id","ventadelivery_id","pizza_id","det_cantidad", "det_precio_unitario", "det_subtotal"];
}
