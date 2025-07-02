<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('school_attendeds', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('student_id');
      $table->foreign('student_id')->references('id')->on('students');
      $table->string('country_of_institution', 100)->nullable();
      $table->string('name_of_institution', 100)->nullable();
      $table->string('level_of_education', 100)->nullable();
      $table->string('primary_language_of_instruction', 100)->nullable();
      $table->date('attended_institution_from', 100)->nullable();
      $table->date('attended_institution_to', 100)->nullable();
      $table->string('degree_name', 100)->nullable();
      $table->boolean('graduated_from_this', 100)->nullable();
      $table->date('graduation_date', 100)->nullable();
      $table->boolean('have_physical_certificate', 100)->nullable();
      $table->string('study_mode', 100)->nullable();
      $table->string('address', 100)->nullable();
      $table->string('city', 100)->nullable();
      $table->string('state', 100)->nullable();
      $table->string('zipcode', 100)->nullable();
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
    Schema::dropIfExists('school_attendeds');
  }
};
