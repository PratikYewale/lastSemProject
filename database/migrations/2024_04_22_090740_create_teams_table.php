<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->longText('description')->nullable();
            $table->json('links')->nullable();
            $table->string('primary_img')->nullable();
            $table->string('secondary_img')->nullable();
            $table->string('primary_video')->nullable();
            $table->string('quote')->nullable();
            $table->longText('intro_para')->nullable();
            $table->longText('body_para')->nullable();
            $table->longText('conclusion')->nullable();
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
        Schema::dropIfExists('teams');
    }
}
