<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVoituresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voitures', function (Blueprint $table) {
            $table->id();
            $table->string('label', 32);
            $table->unsignedBigInteger('id_marque');
            $table->unsignedBigInteger('id_magasin');

            $table->foreign('id_marque')->references('id')->on('marques');
            $table->foreign('id_magasin')->references('id')->on('magasins');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('voitures');
    }
}
