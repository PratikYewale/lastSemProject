<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Drop3ColumnInTeamMemberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('team_member', function (Blueprint $table) {
            $table->dropColumn('team_profile');
        });
        Schema::table('team_member', function (Blueprint $table) {
            $table->bigInteger('team_profile_id')->unsigned()->nullable();
            $table->foreign('team_profile_id')->references('id')->on('team_profiles');
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
