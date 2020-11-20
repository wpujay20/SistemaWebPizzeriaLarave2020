<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalEntregasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_entregas', function (Blueprint $table) {

            $table->increments("personalentrega_id");
            $table->integer("estado_id");
            $table->string("peen_nombres");
            $table->string("peen_apellidos");
            $table->string("peen_telefono");
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
        Schema::dropIfExists('personal_entregas');
    }
}
