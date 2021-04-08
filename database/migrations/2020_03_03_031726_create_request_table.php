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
            $table->text('penjelasan')->nullable();
            $table->string('lampiran')->nullable();
            $table->string('status')->nullable();
            $table->string('keterangan')->nullable();
            $table->string('link')->nullable();
            $table->string('countdown')->nullable();
            $table->string('maintenance')->nullable();
            $table->integer('admin_id')->unsigned()->nullable();
            $table->string('admin')->nullable();
            $table->string('alasan')->nullable();
            $table->string('kapan')->nullable();
            $table->string('surat')->nullable();
            $table->string('develop')->nullable();
            $table->string('userguide')->nullable();
            $table->string('logo')->nullable();
            $table->integer('users_id')->unsigned();
            $table->integer('hapus')->nullable();
            $table->timestamps();

        });
        Schema::table('request', function (Blueprint $table){
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('admin_id')->references('id')->on('users')->onDelete('cascade');

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
