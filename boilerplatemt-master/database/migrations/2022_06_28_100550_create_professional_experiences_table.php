<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfessionalExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professional_experiences', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('resume_id');
            $table->string("company_name")->nullable();
            $table->date("start_date_job")->nullable();
            $table->date("end_date_job")->nullable();
            $table->string("position")->nullable();
            $table->string("grade")->nullable();
            $table->string("skills_acquired")->nullable();
            $table->text("job_descrption")->nullable();
            $table->timestamps();


            $table->foreign('resume_id')->references('id')->on('resumes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('professional_experiences');
    }
}
