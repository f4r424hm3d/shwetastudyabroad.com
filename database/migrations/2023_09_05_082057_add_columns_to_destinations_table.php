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
    Schema::table('destinations', function (Blueprint $table) {
      $table->text('thumbnail_name')->nullable()->after('author_id');
      $table->longText('thumbnail_path')->nullable()->after('thumbnail_name');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('destinations', function (Blueprint $table) {
      //
    });
  }
};
