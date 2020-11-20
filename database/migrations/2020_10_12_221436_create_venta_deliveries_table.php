<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentaDeliveriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venta_deliveries', function (Blueprint $table) {
            
            $table->increments("ventadelivery_id");
            $table->integer("lugarentrega_id");
            $table->string("usuario_id");
            $table->string("personalentrega_id");
            $table->decimal('vnt_monto_final', 8, 2);
            $table->string("vnt_estado");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('venta_deliveries');
    }
}
