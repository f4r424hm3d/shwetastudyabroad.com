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
    Schema::create('job_applications', function (Blueprint $table) {
      $table->id();
      $table->string('name', 200);
      $table->string('email', 200);
      $table->string('mobile', 20);
      $table->string('experience', 200);
      $table->text('message')->nullable();
      $table->string('resume')->nullable();
      $table->text('resume_path')->nullable();
      $table->unsignedBigInteger('position_id')->nullable();
      $table->foreign('position_id')->references('id')->on('careers')->cascadeOnDelete();
      $table->boolean('status')->default(0);
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
    Schema::dropIfExists('job_applications');
  }
};
