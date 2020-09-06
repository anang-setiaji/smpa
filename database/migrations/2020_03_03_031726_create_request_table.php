<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('aplikasi');
            $table->text('penjelasan');
            $table->string('lampiran');
            $table->string('status')->nullable();
            $table->string('keterangan')->nullable();
            $table->string('link')->nullable();
            $table->string('countdown')->nullable();
            $table->string('maintenance')->nullable();
            $table->string('logo')->nullable();
            $table->integer('users_id')->unsigned();
            $table->timestamps();

        });
        Schema::table('request', function (Blueprint $table){
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('request');
    }
}
