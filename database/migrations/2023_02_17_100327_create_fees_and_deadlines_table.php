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
    Schema::create('fees_and_deadlines', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('university_id');
      $table->foreign('university_id')->references('id')->on('universities');
      $table->string('program',100);
      $table->text('application_deadline');
      $table->text('fees');
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
    Schema::dropIfExists('fees_and_deadlines');
  }
};
