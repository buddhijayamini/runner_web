<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbmRacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbm_races', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('external_id',255);
            $table->string('name',255);
            $table->unsignedBigInteger('meeting_id');
            $table->foreign('meeting_id')->references('id')->on('tbm_meetings');
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
        Schema::dropIfExists('tbm_races');
    }
}
