<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProyectoscompartidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyecto_compartidos', function (Blueprint $table) {
            $table->increments('id_proyecto');
            $table->string('nombre', 100);
            $table->text('describcion');
            $table->integer('estado_actual');
            $table->string('estatus', 50)->default("asignacion");
            $table->integer('ncolaboradores')->nullable();
            $table->date('fec_ini');
            $table->date('fec_fin')->nullable();
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
        Schema::dropIfExists('proyectoscompartidos');
    }
}
 