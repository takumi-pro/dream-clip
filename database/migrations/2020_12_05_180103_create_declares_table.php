<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeclaresTable extends Migration
{
    /**
     * Run the migrations.
     *　
     * @return void
     */
    public function up()
    {
        Schema::create('declares', function (Blueprint $table) {
            $table->bigIncrements('id');
            $tablr->string('title');
            $table->bigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('declares');
    }
}
