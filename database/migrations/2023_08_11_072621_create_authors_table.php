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
    Schema::create('authors', function (Blueprint $table) {
      $table->id();
      $table->string('name', 100);
      $table->string('slug', 100);
      $table->string('email', 100)->nullable();
      $table->string('mobile', 100)->nullable();
      $table->string('role', 100)->nullable();
      $table->text('profile_pic')->nullable();
      $table->text('profile_pic_path')->nullable();
      $table->longText('shortnote')->nullable();
      $table->longText('highlights')->nullable();
      $table->longText('experiance')->nullable();
      $table->longText('education')->nullable();
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
    Schema::dropIfExists('authors');
  }
};
