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
    Schema::create('exam_tab_contents', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('tab_id');
      $table->foreign('tab_id')->references('id')->on('exam_tabs')->cascadeOnDelete();
      $table->unsignedBigInteger('parent_id')->nullable();
      $table->foreign('parent_id')->references('id')->on('exam_tab_contents')->nullOnDelete();
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
    Schema::dropIfExists('exam_tab_contents');
  }
};
