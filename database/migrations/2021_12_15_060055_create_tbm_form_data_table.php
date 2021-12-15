<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbmFormDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbm_form_data', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('age')->nullable();
            $table->string('sex',100)->nullable();
            $table->string('color',100)->nullable();
            $table->unsignedBigInteger('runner_id');
            $table->foreign('runner_id')->references('id')->on('tbm_runners');
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
        Schema::dropIfExists('tbm_form_data');
    }
}
