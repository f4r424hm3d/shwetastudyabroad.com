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
    Schema::create('careers', function (Blueprint $table) {
      $table->id();
      $table->string('designation', 200);
      $table->string('slug', 200);
      $table->string('no_of_position', 10);
      $table->string('experience', 200);
      $table->string('location', 200);
      $table->longText('roles', 200)->nullable();
      $table->longText('description', 200)->nullable();
      $table->date('last_date')->nullable();
      $table->text('job_type')->nullable();
      $table->boolean('status')->default(1);
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
    Schema::dropIfExists('careers');
  }
};
