<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatesRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rols', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->timestamps();
        });

        // This may stay due to being what we need all the time
        \Illuminate\Support\Facades\DB::table('rols')->insert([
            ['nombre' => 'Auditor', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Supervisor', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'JefeDeCarrera', 'created_at' => now(), 'updated_at' => now()]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rols');
    }
}
