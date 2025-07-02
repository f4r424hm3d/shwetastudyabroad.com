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
    Schema::create('job_pages', function (Blueprint $table) {
      $table->id();
      $table->text('page_name');
      $table->text('page_slug');
      $table->text('title')->nullable();
      $table->longText('shortnote')->nullable();
      $table->longText('description')->nullable();
      $table->text('thumbnail_name')->nullable();
      $table->text('thumbnail_path')->nullable();
      $table->boolean('status')->default(1);
      $table->boolean('home_view')->default(0);
      $table->text('meta_title')->nullable();
      $table->longText('meta_keyword')->nullable();
      $table->longText('meta_description')->nullable();
      $table->text('page_content')->nullable();
      $table->integer('seo_rating')->nullable();
      $table->unsignedBigInteger('author_id');
      $table->foreign('author_id')->references('id')->on('users');
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
    Schema::dropIfExists('job_pages');
  }
};
