<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            
            $table->string('position');
            $table->longText('description');
            $table->string('company_email');
            $table->string('company_contact_no');
            $table->string('experience')->nullable();
            $table->string('location')->nullable();
            $table->string('created_by')->nullable();
            $table->date('application_end_date')->nullable();
            $table->enum('job_type', ['internship', 'full_time'])->nullable();
            $table->string('salary_range')->nullable();
            $table->string('hiring_manager_name')->nullable();
            $table->string('hiring_manager_contact_no')->nullable();
            $table->string('hiring_manager_email')->nullable();
            $table->enum('status',['Active','Closed','Pending','Draft','Expired','On Hold','Filled','Cancelled','Other'])->default('Pending')->nullable();


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
        Schema::dropIfExists('job');
    }
}
