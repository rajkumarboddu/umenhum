<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTmpUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tmp_users', function (Blueprint $table) {
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
            $table->string('imei_no');
            $table->string('pan_no');
            $table->string('referral_code');
            $table->string('otp');
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
        Schema::drop('tmp_users');
    }
}
