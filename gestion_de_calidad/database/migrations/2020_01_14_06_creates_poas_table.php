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
            $table->text('descripcion');
            $table->unsignedBigInteger('auditor');
            $table->unsignedBigInteger('jefe_carrera');
            $table->date('fecha');
            $table->unsignedBigInteger('id_auditoria');
            $table->timestamps();
        });

        Schema::table('poas', function ($table) {
            $table->foreign('auditor')->references('id_persona')->on('personas');
            $table->foreign('jefe_carrera')->references('id_persona')->on('personas');
            $table->foreign('id_auditoria')->references('id')->on('auditorias');
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
