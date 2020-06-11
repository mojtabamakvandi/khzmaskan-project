<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->nullable();
            $table->string('boodje')->nullable();
            $table->string('metraj')->nullable();
            $table->string('contract')->nullable();
            $table->string('malek')->nullable();
            $table->string('tarah')->nullable();
            $table->string('nazer')->nullable();
            $table->string('location')->nullable();
            $table->string('imgSrc')->nullable();
            $table->bigInteger('person_id')->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->bigInteger('slider_id')->nullable();
            $table->longText('body')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
