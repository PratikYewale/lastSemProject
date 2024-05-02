<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->dateTime('birthday');
            $table->json('achievements')->nullable();
            $table->longText('address_line1')->nullable();
            $table->longText('address_line2')->nullable();
            $table->boolean('is_athlete')->default(false);
            $table->json('schools')->nullable();
            $table->json('links')->nullable();
            $table->string('bio')->nullable();
            $table->string('quote')->nullable();
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
        Schema::dropIfExists('members');
    }
}
