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
            $table->unsignedBigInteger('id_actividad');
            $table->text('descripcion')->nullable();
            $table->string('estado')->default('Pendiente');
            $table->timestamps();
        });

        Schema::table('criterios', function ($table){
            $table->foreign('elem_calidad')->references('id')->on('elemCalidads');
            $table->foreign('id_actividad')->references('id')->on('actividads')->onDelete('cascade');
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
