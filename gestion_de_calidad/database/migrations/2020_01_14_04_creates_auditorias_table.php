<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatesAuditoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auditorias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string("estado");
            $table->date("fecha");
            $table->unsignedBigInteger('id_auditor');
            $table->string("macroproceso");
            $table->string("proceso");
            $table->text("contexto");
            $table->unsignedBigInteger('id_persona');
            $table->string("pdc");
            $table->unsignedBigInteger('elem_calidad');
            $table->timestamps();
        });

        Schema::table('auditorias', function ($table){
            $table->foreign("id_auditor")->references('id_persona')->on('personas');
            $table->foreign("id_persona")->references('id_persona')->on('personas');
            $table->foreign("elem_calidad")->references('id_elem_calidad')->on('elemCalidads');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('auditorias');
    }
}
