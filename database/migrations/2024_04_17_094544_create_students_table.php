<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('full_name')->nullable();
            $table->bigInteger('class_id')->unsigned()->nullable();
            $table->foreign('class_id')->references('id')->on('classes')->nullable();
            $table->string('city')->nullable();
            $table->string('area')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('aadhaar_no')->nullable();
            $table->enum('gender', ['male', 'female', 'other'])->nullable();
            $table->string('student_code')->nullable();
            $table->string('profile_photo')->nullable();
            $table->string('email')->nullable();
            $table->string('password')->nullable();
            $table->string('email_otp')->nullable();
            $table->timestamp('email_otp_expiry')->nullable();
            $table->boolean('is_active')->default(true)->nullable();
            $table->boolean('is_approved')->default(null)->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('students');
    }
}
