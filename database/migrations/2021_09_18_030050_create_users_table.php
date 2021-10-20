<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->increments('user_id'); // primary auto increment
            $table->string('user_email', 100);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('user_password');
            $table->string('user_name');
            $table->string('user_phone');
            $table->string('user_address');
            $table->string('user_birthday');
            $table->string('user_sex');
            $table->string('user_CMND');
            $table->string('user_basic_salary');
            $table->string('user_coefficients_salary');
            $table->string('user_desc');
            $table->integer('user_status')->default(0);// activity or not activity
            $table->string('user_position'); // user or admin
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
