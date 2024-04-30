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
            $table->bigInteger('member_id')->unsigned();
            $table->foreign('member_id')->references('id')->on('members');
            $table->bigInteger('membership_id')->unsigned();
            $table->foreign('membership_id')->references('id')->on('membership');
            $table->string('payment_gateway')->nullable();
            $table->string('payment_gateway_id')->nullable();
            $table->integer('total_amount')->nullable();
            $table->dateTime('start_date')->nullable();
            $table->dateTime('end_date')->nullable();
            $table->enum('status',['paid','pending'])->default('pending');
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
