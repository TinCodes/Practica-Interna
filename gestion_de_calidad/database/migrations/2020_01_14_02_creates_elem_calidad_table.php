<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatesElemCalidadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('elemCalidads', function (Blueprint $table) {
            $table->bigIncrements('id_elem_calidad');
            $table->string('nombre');
            $table->text('descripcion');
            $table->timestamps();
        });

        \Illuminate\Support\Facades\DB::table('elemCalidads')->insert([
            ['nombre' => 'Uno', 'descripcion' => 'First element', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Dos', 'descripcion' => 'Second element', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Tres', 'descripcion' => 'Third element', 'created_at' => now(), 'updated_at' => now()]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('elemCalidads');
    }
}
