<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tel')->nullable();
            $table->string('mobile')->nullable();
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->string('time')->nullable();
            $table->string('welcomeText')->nullable();
            $table->string('headerText')->nullable();
            $table->string('feature1')->nullable();
            $table->string('feature2')->nullable();
            $table->string('feature3')->nullable();
            $table->string('history')->nullable();
            $table->string('historyFeature1')->nullable();
            $table->string('historyFeature2')->nullable();
            $table->string('mojritd')->nullable();
            $table->string('projecttd')->nullable();
            $table->string('zarfiat')->nullable();
            $table->string('contactTitle')->nullable();
            $table->string('btnWelcomeText')->nullable();
            $table->string('btnWelcomeLink')->nullable();
            $table->string('logoUrl')->nullable();
            $table->string('copyRight')->nullable();
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
        Schema::dropIfExists('settings');
    }
}
