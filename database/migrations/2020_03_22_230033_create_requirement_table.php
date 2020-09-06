<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequirementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requirement', function (Blueprint $table) {
            $table->increments('id');
            $table->string('syarat')->nullable();
            $table->string('checkbox')->nullable();
            $table->integer('request_id')->unsigned();
            $table->timestamps();
        });
         Schema::table('requirement', function (Blueprint $table){
            $table->foreign('request_id')->references('id')->on('request')->onDelete('cascade');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requirement');
    }
}
