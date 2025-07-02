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
    Schema::create('university_scholarship_contents', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('scholarship_id');
      $table->foreign('scholarship_id')->references('id')->on('university_scholarships')->cascadeOnDelete();
      $table->text('thumbnail_path')->nullable();
      $table->text('title')->nullable();
      $table->longText('description')->nullable();
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
    Schema::dropIfExists('university_scholarship_contents');
  }
};
