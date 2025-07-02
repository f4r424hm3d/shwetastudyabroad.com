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
    Schema::create('university_other_contents', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('university_id');
      $table->foreign('university_id')->references('id')->on('universities');
      $table->text('tab_name');
      $table->text('tab_slug');
      $table->longText('description');
      $table->text('thumbnail_name')->nullable();
      $table->text('thumbnail_path')->nullable();
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
    Schema::dropIfExists('university_other_contents');
  }
};
