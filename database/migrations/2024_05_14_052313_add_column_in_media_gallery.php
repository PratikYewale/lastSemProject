<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnInMediaGallery extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('media_gallery', function (Blueprint $table) {
            $table->dropColumn('media');
        });
        Schema::table('media_gallery', function (Blueprint $table) {
            $table->longText('media')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('media_gallery', function (Blueprint $table) {
            //
        });
    }
}
