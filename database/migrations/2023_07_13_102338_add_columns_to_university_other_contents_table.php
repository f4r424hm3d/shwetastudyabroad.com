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
    Schema::table('university_other_contents', function (Blueprint $table) {
      $table->text('seo_rating')->after('thumbnail_path')->nullable();
      $table->text('og_image_path')->after('thumbnail_path')->nullable();
      $table->string('page_content', 100)->after('thumbnail_path')->nullable();
      $table->longText('meta_description')->after('thumbnail_path')->nullable();
      $table->longText('meta_keyword')->after('thumbnail_path')->nullable();
      $table->text('meta_title')->after('thumbnail_path')->nullable();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('university_other_contents', function (Blueprint $table) {
      //
    });
  }
};
