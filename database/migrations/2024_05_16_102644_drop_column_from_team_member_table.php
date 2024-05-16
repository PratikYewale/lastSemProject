<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropColumnFromTeamMemberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('team_member', function (Blueprint $table) {
            $table->dropForeign('team_member_member_id_foreign');
            $table->dropColumn('member_id');
        });
        Schema::table('team_member', function (Blueprint $table) {
            $table->bigInteger('athlete_id')->unsigned()->nullable();
            $table->foreign('athlete_id')->references('id')->on('users'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('team_member', function (Blueprint $table) {
            //
        });
    }
}
