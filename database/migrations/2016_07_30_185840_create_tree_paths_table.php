<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTreePathsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tree_paths',function(Blueprint $table){
            $table->increments('id');
            $table->integer('ancestor_id')->unsigned();
            $table->foreign('ancestor_id')->references('id')->on('users');
            $table->integer('descendant_id')->unsigned();
            $table->foreign('descendant_id')->references('id')->on('users');
            $table->integer('depth');
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
        Schema::drop('tree_paths');
    }
}
