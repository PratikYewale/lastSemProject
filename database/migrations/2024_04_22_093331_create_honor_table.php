<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHonorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('honor', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('donor_id')->unsigned();
            $table->foreign('donor_id')->references('id')->on('donors');
            $table->enum('type',['in honor of','in memory of'])->default('in honor of');
            $table->string('honoree_first_name');
            $table->string('honoree_last_name');
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
        Schema::dropIfExists('honor');
    }
}
