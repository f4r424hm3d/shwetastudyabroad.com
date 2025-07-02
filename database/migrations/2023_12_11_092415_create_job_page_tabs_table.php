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
    Schema::create('job_page_tabs', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('page_id');
      $table->foreign('page_id')->references('id')->on('job_pages')->cascadeOnDelete();
      $table->string('tab_name', 100);
      $table->string('tab_slug', 100);
      $table->integer('position')->default(1);
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
    Schema::dropIfExists('job_page_tabs');
  }
};
