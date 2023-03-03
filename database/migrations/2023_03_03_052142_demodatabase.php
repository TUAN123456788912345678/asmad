<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Demodatabase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category', function($table){
            $table->increments('id');
            $table->string('name',200);
            $table->longtext('description');
        });

        Schema::create('course', function($table){
            $table->increments('id');
            $table->string('name',200);
            $table->longtext('description');
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('category');
        });

        Schema::create('topic', function($table){
            $table->increments('id');
            $table->string('name',200);
            $table->longtext('description');
            $table->integer('course_id')->unsigned();
            $table->foreign('course_id')->references('id')->on('course');
        });

        Schema::create('trainee', function($table){
            $table->increments('id');
            $table->string('name',200);
            $table->string('account',200);
            $table->string('age',3);
            $table->string('DoB',10);
            $table->string('address',100);
            $table->string('department',200);
            $table->string('toeic_score',200);
            $table->string('main_progarmming_language',200);
        });

        Schema::create('assigned_course', function($table){
            $table->increments('id');
            $table->integer('course_id')->unsigned();
            $table->foreign('course_id')->references('id')->on('course');
            $table->integer('trainee_id')->unsigned();
            $table->foreign('trainee_id')->references('id')->on('trainee');
        });

        Schema::create('role', function($table){
            $table->increments('id');
            $table->string('name',200);
            $table->longtext('description');
        });

        Schema::create('human_resource', function($table){
            $table->increments('id');
            $table->string('username',200);
            $table->string('password',200);
            $table->string('name',200);
            $table->string('email',200);
            $table->string('phone',200);
            $table->string('department',200);
            $table->string('type',200);
            $table->string('education',200);
            $table->integer('role_id')->unsigned();
            $table->foreign('role_id')->references('id')->on('role');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
