<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatesCargosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cargos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cargo');
            $table->timestamps();
        });

        \Illuminate\Support\Facades\DB::table('cargos')->insert([
            ['cargo' => 'Decano', 'created_at' => now(), 'updated_at' => now()],
            ['cargo' => 'Jefe de Marketing', 'created_at' => now(), 'updated_at' => now()],
            ['cargo' => 'Jefe de Comunicacion', 'created_at' => now(), 'updated_at' => now()],
            ['cargo' => 'Jefe de Administracion', 'created_at' => now(), 'updated_at' => now()],
            ['cargo' => 'Jefe de DTI', 'created_at' => now(), 'updated_at' => now()],
            ['cargo' => 'Decano de FIA', 'created_at' => now(), 'updated_at' => now()]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cargos');
    }
}
