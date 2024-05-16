<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnInEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropForeign('events_program_id_foreign');
            $table->dropForeign('events_team_id_foreign');
            $table->dropColumn(['team_id','program_id','primary_img','secondary_img','intro_para','body_para','conclusion','is_competition']);
        });
        Schema::table('events', function (Blueprint $table) {
            $table->longText('description')->nullable();
            $table->string('address')->nullable();
            $table->string('file')->nullable();
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('events', function (Blueprint $table) {
            //
        });
    }
}
