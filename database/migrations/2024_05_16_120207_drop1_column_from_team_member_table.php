<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Drop1ColumnFromTeamMemberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('team_member', function (Blueprint $table) {
            $table->dropForeign('team_member_team_profile_id_foreign');
            $table->dropColumn('team_profile_id');
        });
        Schema::table('team_member', function (Blueprint $table) {
            $table->string('team_profile');
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
