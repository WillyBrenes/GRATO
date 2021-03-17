<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTMateriaPrima extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_materia_prima', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->bigIncrements('id_materia_prima');
            $table->string('producto');
            $table->string('unidad_medida');
            $table->integer('presentacion');
            $table->integer('cantidad');
            $table->decimal('costo', 8, 2);
            $table->decimal('precio_um', 8, 2);
        });

        Schema::table('t_materia_prima', function($table) {
            $table->bigInteger('id_producto')->unsigned()->index(); // this is working
            $table->foreign('id_producto')->references('id_producto')->on('t_producto')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_materia_prima');
    }
}