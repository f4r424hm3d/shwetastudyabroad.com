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
    Schema::create('default_og_images', function (Blueprint $table) {
      $table->id();
      $table->string('page', 200);
      $table->string('file_name', 200);
      $table->text('file_path');
      $table->boolean('default')->default(1);
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
    Schema::dropIfExists('default_og_images');
  }
};
