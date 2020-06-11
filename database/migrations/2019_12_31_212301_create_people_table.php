<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('shenase')->nullable();
            $table->string('avatar')->nullable();
            $table->string('password')->nullable();
            $table->string('mobile')->nullable();
            $table->string('email')->nullable();
            $table->string('type')->nullable();
            $table->string('name')->nullable();
            $table->string('parvaneh')->nullable();
            $table->string('ozviat')->nullable();
            $table->string('pejra')->nullable();
            $table->string('dtactive')->nullable();
            $table->string('dtsodoor')->nullable();
            $table->string('etebar')->nullable();
            $table->string('zarfiatTD')->nullable();
            $table->string('zarfiatMetraj')->nullable();
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
        Schema::dropIfExists('people');
    }
}
