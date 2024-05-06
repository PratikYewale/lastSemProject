<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAtheletesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atheletes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users');       
            $table->string('gender');
            $table->date('date_of_birth');
            $table->string('city');
            $table->string('address');
            $table->string('state');
            $table->string('country');
            $table->string('postal_code');
            $table->string('aadhar_number');
            $table->string('passport_number');
            $table->string('profile_picture');
            $table->string('recommendation');
            $table->string('addhar_card');
            $table->string('passport');
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
        Schema::dropIfExists('atheletes');
    }
}
