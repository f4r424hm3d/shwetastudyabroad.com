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
    Schema::create('job_page_tab_contents', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('tab_id');
      $table->foreign('tab_id')->references('id')->on('job_page_tabs')->cascadeOnDelete();
      $table->text('heading');
      $table->longText('description')->nullable();
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
    Schema::dropIfExists('job_page_tab_contents');
  }
};
