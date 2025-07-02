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
    Schema::create('destinations', function (Blueprint $table) {
      $table->id();
      $table->string('destination_name',100);
      $table->string('destination_slug',100);
      $table->string('country',100)->nullable();
      $table->text('title')->nullable();
      $table->longText('description')->nullable();
      $table->unsignedBigInteger('author_id')->nullable();
      $table->boolean('status')->default(1);
      $table->string('og_img_name')->nullable();
      $table->text('og_img_path')->nullable();
      $table->text('meta_title')->nullable();
      $table->longText('meta_keyword')->nullable();
      $table->longText('meta_description')->nullable();
      $table->text('page_content')->nullable();
      $table->integer('seo_rating')->nullable();
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
    Schema::dropIfExists('destinations');
  }
};
