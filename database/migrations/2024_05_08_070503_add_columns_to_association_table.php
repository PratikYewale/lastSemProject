<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToAssociationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('association', function (Blueprint $table) {
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('logo')->nullable();
            $table->string('name_of_state_unit')->nullable();
            $table->date('date_of_establishment')->nullable();
            $table->string('incorporation_certificate_number')->nullable();
            $table->boolean('recognition_by_state_government')->nullable();
            $table->boolean('recognition_by_state_olympic_association')->nullable();
            $table->boolean('hosted_national_event_in_past_3-yrs')->nullable();
            $table->boolean('hosted_international_event_in_past_4_yrs')->nullable();
            $table->boolean('active_athletes_competed_in_past_2_yrs')->nullable();
            $table->string('registered_address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('website')->nullable();
            $table->string('president_name')->nullable();
            $table->string('president_email')->nullable();
            $table->string('president_phone_number')->nullable();
            $table->string('president_signature')->nullable();
            $table->string('signature_of_bearer_1')->nullable();
            $table->string('signature_of_bearer_2')->nullable();
            $table->boolean('acknowledgement')->nullable();


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
