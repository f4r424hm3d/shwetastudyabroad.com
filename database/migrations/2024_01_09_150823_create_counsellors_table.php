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
    Schema::create('counsellors', function (Blueprint $table) {
      $table->id();
      $table->string('name', 100);
      $table->string('photo_name')->nullable();
      $table->text('photo_path')->nullable();
      $table->string('designation');
      $table->string('experience');
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
    Schema::dropIfExists('counsellors');
  }
};
