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
    Schema::create('destination_article_contents', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('article_id');
      $table->foreign('article_id')->references('id')->on('destination_articles')->cascadeOnDelete();
      $table->unsignedBigInteger('parent_id')->nullable();
      $table->foreign('parent_id')->references('id')->on('destination_article_contents')->nullOnDelete();
      $table->text('heading');
      $table->longText('description')->nullable();
      $table->text('image_name')->nullable();
      $table->text('image_path')->nullable();
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
    Schema::dropIfExists('destination_article_contents');
  }
};
