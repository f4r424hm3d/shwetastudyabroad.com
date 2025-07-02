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
    Schema::create('destination_articles', function (Blueprint $table) {
      $table->id();
      $table->text('title');
      $table->text('page_url');
      $table->unsignedBigInteger('destination_id')->nullable();
      $table->foreign('destination_id')->references('id')->on('destinations')->nullOnDelete();
      $table->unsignedBigInteger('author_id')->nullable();
      $table->foreign('author_id')->references('id')->on('users')->nullOnDelete();
      $table->text('heading')->nullable();
      $table->longText('description')->nullable();
      $table->longText('description2')->nullable();
      $table->text('image_name')->nullable();
      $table->text('image_path')->nullable();
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
    Schema::dropIfExists('destination_articles');
  }
};
