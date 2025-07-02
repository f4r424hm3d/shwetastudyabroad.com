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
    Schema::create('exam_tab_faqs', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('tab_id');
      $table->foreign('tab_id')->references('id')->on('exam_tabs')->cascadeOnDelete();
      $table->text('question');
      $table->text('answer');
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
    Schema::dropIfExists('exam_tab_faqs');
  }
};
