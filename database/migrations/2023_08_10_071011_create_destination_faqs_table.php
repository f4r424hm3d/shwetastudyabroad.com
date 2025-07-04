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
    Schema::create('destination_faqs', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('destination_id');
      $table->foreign('destination_id')->references('id')->on('destinations')->cascadeOnDelete();
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
    Schema::dropIfExists('destination_faqs');
  }
};
