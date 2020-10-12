<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipoPizzasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_pizzas', function (Blueprint $table) {
            $table->increments("tipopizza_id");
            $table->integer("tpi_nombre");
            $table->string("tpi_tamano"); // chica  mediana  familiar 
            $table->text("tpi_descripcion");
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
        Schema::dropIfExists('tipo_pizzas');
    }
}
