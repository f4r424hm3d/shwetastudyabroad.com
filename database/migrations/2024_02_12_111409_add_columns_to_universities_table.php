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
    Schema::table('universities', function (Blueprint $table) {
      $table->unsignedBigInteger('parent_university_id')->nullable()->after('destination_id');
      $table->foreign('parent_university_id')->references('id')->on('universities')->nullOnDelete();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('universities', function (Blueprint $table) {
      //
    });
  }
};
