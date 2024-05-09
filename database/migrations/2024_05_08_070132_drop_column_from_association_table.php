<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropColumnFromAssociationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('association', function (Blueprint $table) {
            $table->dropColumn('logo');
            $table->dropColumn('association_name');
            $table->dropColumn('association_mail');
            $table->dropColumn('association_contact');
            $table->dropColumn('address');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('association', function (Blueprint $table) {
            //
        });
    }
}
