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
    Schema::create('university_scholarships', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('university_id')->nullable();
      $table->foreign('university_id')->references('id')->on('universities')->nullOnDelete();
      $table->string('scholarship_name', 100);
      $table->string('scholarship_slug', 100);
      $table->string('international_student_eligible', 100)->nullable();
      $table->bigInteger('amount')->nullable();
      $table->bigInteger('number_of_scholarship')->nullable();
      $table->unsignedBigInteger('level_id')->nullable();
      $table->foreign('level_id')->references('id')->on('levels')->nullOnDelete();
      $table->text('shortnote')->nullable();
      $table->longText('description')->nullable();
      $table->text('meta_title')->nullable();
      $table->longText('meta_keyword')->nullable();
      $table->longText('meta_description')->nullable();
      $table->string('page_content', 100)->nullable();
      $table->text('og_image_path')->nullable();
      $table->text('seo_rating')->nullable();
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
    Schema::dropIfExists('university_scholarships');
  }
};
