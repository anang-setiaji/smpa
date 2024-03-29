<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('phone')->nullable();
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->string('jabatan');
            $table->string('foto')->nullable();
            $table->string('profile_image')->nullable();
            $table->string('asal')->nullable();
            $table->string('contact')->nullable();
            $table->string('remember_token')->nullable();
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
            Schema::dropIfExists('users');
        }
    
}
