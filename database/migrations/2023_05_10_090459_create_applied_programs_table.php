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
    Schema::create('applied_programs', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('student_id');
      $table->foreign('student_id')->references('id')->on('students');
      $table->unsignedBigInteger('program_id');
      $table->foreign('program_id')->references('id')->on('university_programs');
      $table->boolean('status')->default(0);
      $table->string('application_status')->default('not-paid');
      $table->string('stage')->default('pre-payment');
      $table->date('payment_date')->nullable();
      $table->boolean('sent')->default(0);
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
    Schema::dropIfExists('applied_programs');
  }
};
