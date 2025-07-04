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
      $table->integer('qs_rank')->nullable()->after('university_rank');
      $table->integer('us_world_rank')->nullable()->after('qs_rank');
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
