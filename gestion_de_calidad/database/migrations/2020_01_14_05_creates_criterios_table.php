<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatesCriteriosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('criterios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('elem_calidad');
            $table->unsignedBigInteger('id_auditoria');
            $table->text('descripcion');
            $table->string('estado');
            $table->timestamps();
        });

        Schema::table('criterios', function ($table){
            $table->foreign('elem_calidad')->references('id_elem_calidad')->on('elemCalidads');
            $table->foreign('id_auditoria')->references('id_auditoria')->on('auditorias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('criterios');
    }
}
