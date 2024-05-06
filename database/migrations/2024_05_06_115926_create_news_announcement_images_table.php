<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsAnnouncementImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_announcement_images', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('news_id')->unsigned()->nullable();
            $table->foreign('news_id')->references('id')->on('news');
            $table->bigInteger('announcement_id')->unsigned()->nullable();
            $table->foreign('announcement_id')->references('id')->on('announcement');
            $table->string('images');
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
        Schema::dropIfExists('news_announcement_images');
    }
}
