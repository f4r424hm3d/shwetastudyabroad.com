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
    Schema::create('exam_tabs', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('exam_id');
      $table->foreign('exam_id')->references('id')->on('exams')->cascadeOnDelete();
      $table->unsignedBigInteger('parent_id')->nullable();
      $table->foreign('parent_id')->references('id')->on('exam_tabs')->nullOnDelete();
      $table->unsignedBigInteger('author_id')->nullable();
      $table->foreign('author_id')->references('id')->on('users')->nullOnDelete();
      $table->string('tab_name', 100);
      $table->string('tab_slug', 100);
      $table->text('heading');
      $table->longText('description');
      $table->longText('description2');
      $table->text('image_name')->nullable();
      $table->text('image_path')->nullable();
      $table->boolean('header_view')->default(0);
      $table->integer('position')->default(1);
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
    Schema::dropIfExists('exam_tabs');
  }
};
