<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatesPoasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('poas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('estado');
            $table->text('razonRechazo')->nullable();
            $table->text('descripcion');
            $table->unsignedBigInteger('auditor');
            $table->unsignedBigInteger('jefe_carrera');
            $table->date('fechaVencimiento');
            $table->unsignedBigInteger('id_actividad');
            $table->unsignedBigInteger('elem_calidad');
            $table->timestamps();
        });

        Schema::table('poas', function ($table) {
            $table->foreign('auditor')->references('id_persona')->on('personas');
            $table->foreign('jefe_carrera')->references('id_persona')->on('personas');
            $table->foreign('id_actividad')->references('id')->on('actividads')->onDelete('cascade');
            $table->foreign('elem_calidad')->references('id')->on('elemCalidads');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('poas');
    }
}
