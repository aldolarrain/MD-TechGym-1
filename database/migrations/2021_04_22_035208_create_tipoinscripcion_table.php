<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipoinscripcionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipoinscripcion', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',40);
            $table->float('precio',8,2);
            $table->string('periodo',40);
            $table->integer('frecuencia');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipoinscripcion');
    }
}
