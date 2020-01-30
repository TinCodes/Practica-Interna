<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatesCampusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campuses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('campus');
            $table->timestamps();
        });

        \Illuminate\Support\Facades\DB::table('campuses')->insert([
            ['campus' => 'La Paz', 'created_at' => now(), 'updated_at' => now()],
            ['campus' => 'Cochabamba', 'created_at' => now(), 'updated_at' => now()],
            ['campus' => 'Santa Cruz', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('campuses');
    }
}
