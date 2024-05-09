<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('job_display', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('posted_by')->nullable();
            $table->foreign('posted_by')->references('id')->on('users')->onDelete('cascade');
            $table->string('job_title')->nullable();
            $table->string('job_type')->nullable();
            $table->string('company')->nullable();
            $table->string('contact')->nullable();
            $table->string('email')->nullable();
            $table->string('location')->nullable();
            $table->string('salary_range')->nullable();
            $table->string('category')->nullable();
            $table->string('application_instructions')->nullable();
            $table->string('job_description')->nullable();
            $table->string('deadline')->nullable();
            $table->timestamps();
        });

        Schema::create('job_application', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('job_display_id')->nullable();
            $table->foreign('job_display_id')->references('id')->on('job_display')->onDelete('cascade');
            $table->string('applicant_cv')->nullable();
            $table->string('applicant_letter')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_display');
        Schema::dropIfExists('job_application');
    }
};
