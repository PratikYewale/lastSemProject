<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobApplicationDocTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_application_doc', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('job_application_id')->unsigned()->nullable();
            $table->foreign('job_application_id')->references('id')->on('job_application');
            $table->enum('document_type',['Resume','CV','Cover Letter','Other'])->nullable();
            $table->string('document')->nullable();
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
        Schema::dropIfExists('job_application_doc');
    }
}
