<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSharedactivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sharedactivities', function (Blueprint $table) {
            $table->increments('id_actividad');
            $table->unsignedInteger('id_proyecto');
            $table->unsignedInteger('id_colaborador');
            $table->string('titulo', 100);
            $table->text('descripcion')->nullable();
            $table->string('prioridad', 20)->default('bajo');
            $table->string('estado', 30)->default('en progreso');
            $table->string('colaborador', 30)->nullable();;
            $table->date('fec_exp')->nullable();
            $table->time('hrs_exp')->nullable();
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
        Schema::dropIfExists('sharedactivities');
    }
}
