<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('logo')->nullable();
            $table->date('date_of_establishment')->nullable();
            $table->string('incorporation_certificate_number')->nullable();
            $table->boolean('recognition_by_state_government')->nullable();
            $table->boolean('recognition_by_state_olympic_association')->nullable();
            $table->boolean('hosted_national_event_in_past_3-yrs')->nullable();
            $table->boolean('hosted_international_event_in_past_4_yrs')->nullable();
            $table->boolean('active_athletes_competed_in_past_2_yrs')->nullable();
            $table->string('registered_address')->nullable();
            $table->string('city')->nullable();
            $table->string('address')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('website')->nullable();
            $table->string('president_name')->nullable();
            $table->string('president_email')->nullable();
            $table->string('president_phone_number')->nullable();
            $table->string('president_signature')->nullable();
            $table->string('signature_of_bearer_1')->nullable();
            $table->string('signature_of_bearer_2')->nullable();
            $table->boolean('acknowledgement')->nullable();
            $table->string('gender')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('aadhar_number')->nullable();
            $table->string('passport_number')->nullable();
            $table->string('profile_picture')->nullable();
            $table->string('recommendation')->nullable();
            $table->string('aadhar_card')->nullable();
            $table->string('passport')->nullable();
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
        Schema::table('user', function (Blueprint $table) {
            //
        });
    }
}
