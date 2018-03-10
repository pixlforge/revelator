<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOptionProgramTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('option_program', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('option_id');
            $table->unsignedInteger('program_id');
            $table->tinyInteger('value')->default(0);

            $table->foreign('option_id')->references('id')->on('options')->onDelete('cascade');
            $table->foreign('program_id')->references('id')->on('programs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('option_program');
    }
}
