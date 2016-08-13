<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('first_name',60);
            $table->string('last_name',60);
            $table->string('email')->unique();
            $table->string('mobile')->unique();
            $table->string('password');
            $table->string('gender',1);
            $table->date('dob');
            $table->string('address');
            $table->string('pincode',6);
            $table->string('imei_no')->unique();
            $table->string('pan_no')->unique();
            $table->string('referral_code')->unique();
            $table->integer('credits_balance');
            $table->string('otp');
            $table->integer('status')->default(0);
            $table->integer('reset_token');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::table('users', function(Blueprint $table)
        {
            Schema::dropIfExists('users');
        });
    }
}
