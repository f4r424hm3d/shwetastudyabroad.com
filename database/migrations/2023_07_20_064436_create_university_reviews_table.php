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
    Schema::create('university_reviews', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('university_id');
      $table->foreign('university_id')->references('id')->on('universities');
      $table->string('name', 100);
      $table->string('email', 100);
      $table->string('mobile', 100);
      $table->string('passing_year', 100)->nullable();
      $table->unsignedBigInteger('program_id')->nullable();
      $table->foreign('program_id')->references('id')->on('university_programs')->nullOnDelete();
      $table->text('title')->nullable();
      $table->longText('review');
      $table->integer('rating');
      $table->longText('infrastructure_review')->nullable();
      $table->integer('infrastructure_rating')->nullable();
      $table->longText('faculty_review')->nullable();
      $table->integer('faculty_rating')->nullable();
      $table->longText('placement_review')->nullable();
      $table->integer('placement_rating')->nullable();
      $table->longText('hostel_review')->nullable();
      $table->integer('hostel_rating')->nullable();
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
    Schema::dropIfExists('university_reviews');
  }
};
