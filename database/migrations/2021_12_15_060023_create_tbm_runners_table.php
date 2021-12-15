<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbmRunnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbm_runners', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('external_id',255);
            $table->string('name',255);
            $table->unsignedBigInteger('race_id');
            $table->foreign('race_id')->references('id')->on('tbm_races');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbm_runners');
    }
}
