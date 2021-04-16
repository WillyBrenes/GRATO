<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTTotales extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_totales', function (Blueprint $table) {
            $table->bigIncrements('id_total');
            $table->decimal('total_materia_prima',8,2)->nullable();
            $table->decimal('total_mano_de_obra',8,2)->nullable();
            $table->decimal('total_equipos',8,2)->nullable();
            $table->decimal('total_cif',8,2)->nullable();
            $table->decimal('total_viaticos',8,2)->nullable();
            $table->timestamps();
        });

        Schema::table('t_totales', function($table) {
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
        Schema::dropIfExists('t_totales');
    }
}
