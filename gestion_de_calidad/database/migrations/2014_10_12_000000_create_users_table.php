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
            $table->string('password');
            $table->timestamps();
        });


        Schema::table('users', function ($table) {
            $table->foreign('rol')->references('id')->on('rols');
        });

        // TODO These are dummy records so as to use them while were still at development phase, we need to delete them when development phase ends
        \Illuminate\Support\Facades\DB::table('users')->insert([
           ['nombre' => 'Tincho', 'rol' => '1', 'email' => 'martin@loslaguna.com', 'password' => 'abc',  'created_at' => now(), 'updated_at' => now()],
           ['nombre' => 'Camila', 'rol' => '3', 'email' => 'camila.loayzab@gmail.com', 'password' => 'abc','created_at' => now(), 'updated_at' => now()]
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
