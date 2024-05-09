<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToAssociationssTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('association', function (Blueprint $table) {
            $table->string('currency')->nullable();
            $table->string('amount')->nullable();
            $table->string('payment_gateway')->nullable();
            $table->string('payment_gateway_id')->after('payment_gateway')->nullable();
            $table->enum('status',['paid','pending'])->after('payment_gateway_id')->default('pending');
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
