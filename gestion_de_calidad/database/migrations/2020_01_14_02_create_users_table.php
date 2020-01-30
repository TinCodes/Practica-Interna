<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->unsignedBigInteger('rol');
            $table->string('email')->unique();
            $table->string('cargo')->nullable();
            $table->string('campus')->nullable();
            $table->string('password');
            $table->timestamps();
        });


        Schema::table('users', function ($table) {
            $table->foreign('rol')->references('id')->on('rols');
        });

        // TODO These are dummy records so as to use them while were still at development phase, we need to delete them when development phase ends
        \Illuminate\Support\Facades\DB::table('users')->insert([
           ['nombre' => 'Tincho', 'rol' => '1', 'email' => 'martin@loslaguna.com', 'cargo'=> 'Jefaso', 'campus'=>'Cochabamba', 'password' => '$2b$10$Jwaos.KCEOx67vMBsPjsA.4xf9i/LOb6O0K2H9ZVkriz4Ea7T3F86',  'created_at' => now(), 'updated_at' => now()],
           ['nombre' => 'Camila', 'rol' => '3', 'email' => 'camila.loayzab@gmail.com', 'cargo'=> 'Manager', 'campus'=>'Cochabamba', 'password' => '$2b$10$h9DTX5DLbvScNHkyPCI3aeQKOC7aTZnK.5SNWgPO1/z8Wi73uND1e','created_at' => now(), 'updated_at' => now()],
           ['nombre' => 'Alejandra', 'rol' => '2', 'email' => 'camiloayzab@gmail.com', 'cargo'=> 'Jefasa', 'campus'=>'La Paz', 'password' => '$2b$10$Jwaos.KCEOx67vMBsPjsA.4xf9i/LOb6O0K2H9ZVkriz4Ea7T3F86',  'created_at' => now(), 'updated_at' => now()]
        ]);
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
