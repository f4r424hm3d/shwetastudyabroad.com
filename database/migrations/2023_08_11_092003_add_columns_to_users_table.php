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
    Schema::table('users', function (Blueprint $table) {
      $table->unsignedBigInteger('role_id')->nullable()->after('role');
      $table->foreign('role_id')->references('id')->on('roles')->nullOnDelete();
      $table->longText('shortnote')->nullable();
      $table->longText('highlights')->nullable();
      $table->longText('experiance')->nullable();
      $table->longText('education')->nullable();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('users', function (Blueprint $table) {
      //
    });
  }
};
