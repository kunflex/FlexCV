<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('cv_personal_details', function (Blueprint $table) {
            $table->id();
            $table->string('picture')->nullable();
            $table->string('firstname')->nullable();
            $table->string('othername')->nullable();
            $table->string('lastname')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('phone_number')->nullable();
            $table->string('address')->nullable();
            $table->string('country')->nullable();
            $table->string('city_town')->nullable();
            $table->date('DOB')->nullable();
            $table->text('skills')->nullable();
            $table->text('summary')->nullable();
            $table->timestamps();
        });

        Schema::create('cv_additional_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cv_personal_details_id')->nullable();
            $table->foreign('cv_personal_details_id')->references('id')->on('cv_personal_details')->onDelete('cascade');
            $table->text('other_details')->nullable();
            $table->timestamps();
        });


        Schema::create('cv_experience', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cv_personal_details_id')->nullable();
            $table->foreign('cv_personal_details_id')->references('id')->on('cv_personal_details')->onDelete('cascade');
            $table->string('job_title')->nullable();
            $table->string('company')->nullable();
            $table->string('city_town')->nullable();
            $table->string('country')->nullable();
            $table->text('responsibilities')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->timestamps();
        });


        Schema::create('cv_education', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cv_personal_details_id')->nullable();
            $table->foreign('cv_personal_details_id')->references('id')->on('cv_personal_details')->onDelete('cascade');
            $table->string('institution')->nullable();
            $table->string('certification')->nullable();
            $table->string('field_of_study')->nullable();
            $table->string('location')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->timestamps();
        });


        Schema::create('cv_references', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cv_personal_details_id')->nullable();
            $table->foreign('cv_personal_details_id')->references('id')->on('cv_personal_details')->onDelete('cascade');
            $table->string('fullname')->nullable();
            $table->string('position')->nullable();
            $table->string('company')->nullable();
            $table->string('email')->nullable();
            $table->string('telephone')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('cv_personal_details');
        Schema::dropIfExists('cv_additional_details');
        Schema::dropIfExists('cv_experience');
        Schema::dropIfExists('cv_education');
        Schema::dropIfExists('cv_references');
    }
};
