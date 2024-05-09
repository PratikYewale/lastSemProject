<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSportCertificateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sport_certificates', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('athlete_id')->unsigned()->nullable();
            $table->foreign('athlete_id')->references('id')->on('athletes');
            $table->string('certificate')->nullable();
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
        Schema::dropIfExists('sport_certificates');
    }
}
