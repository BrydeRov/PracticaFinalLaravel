<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsolasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consolas', function (Blueprint $table) {
            $table->id();
            $table->string('NombreConsola');
            $table->timestamps();
        });

        Schema::table('juegos' , function (Blueprint $table) {
            $table->unsignedBigInteger('consola_id')->nullable()->after('id');

            $table->foreign('consola_id')->references('id')->on('consolas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consolas');
    }
}
