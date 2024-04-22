<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembershipHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('membership_history', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('membership_id')->unsigned();
            $table->foreign('membership_id')->references('id')->on('membership');
            $table->string('payment_gateway')->nullable();
            $table->string('payment_gateway_id')->nullable();
            $table->string('payment_gateway_id')->nullable();
            $table->integer('total_amount')->nullable();
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
        Schema::dropIfExists('membership_history');
    }
}
