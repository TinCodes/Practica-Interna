<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatesPersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->bigIncrements('id_persona');
            $table->string('nombre')->charset('utf8');
            $table->unsignedBigInteger('rol');
            $table->string('psw');
            $table->string('mail');
            $table->timestamps();
        });

        Schema::table('personas', function ($table) {
            $table->foreign('rol')->references('id')->on('rols');
        });

        // TODO These are dummy records so as to use them while were still at development phase, we need to delete them when development phase ends
        \Illuminate\Support\Facades\DB::table('personas')->insert([
           ['nombre' => 'Tincho', 'rol' => '1', 'psw' => 'abc', 'mail' => 'martin@loslaguna.com', 'created_at' => now(), 'updated_at' => now()],
           ['nombre' => 'Camila', 'rol' => '3', 'psw' => '123', 'mail' => 'camila.loayzab@gmail.com', 'created_at' => now(), 'updated_at' => now()]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personas');
    }
}
