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
            $table->string('student_id')->unique();
            $table->string('fname');
            $table->string('lname');
            $table->string('gender');
            $table->string('department');
            $table->integer('batch');
            $table->string('pimage')->default('default.jpg');
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('role')->default('0');
            $table->string('Status')->default('New');
            $table->rememberToken();
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
