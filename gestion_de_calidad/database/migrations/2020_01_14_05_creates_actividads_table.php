<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatesActividadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actividads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string("estado")->default('Pendiente');
            $table->string('tipo')->default('none');
            $table->dateTime("fechaHora");
            $table->unsignedBigInteger('id_auditor');
            $table->string("macroproceso");
            $table->text("descripcion");
            $table->unsignedBigInteger('id_persona');
            $table->string("pdc");
            $table->timestamps();
        });

        Schema::table('actividads', function ($table){
            $table->foreign("id_auditor")->references('id')->on('users');
            $table->foreign("id_persona")->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('actividads');
    }
}
