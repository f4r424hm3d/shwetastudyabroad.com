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
      $table->text('languages')->nullable()->after('shortnote');
      $table->string('branch')->nullable()->after('shortnote');
      $table->string('department')->nullable()->after('shortnote');
      $table->string('experience_short')->nullable()->after('shortnote');
      $table->longText('experience_description')->nullable()->after('shortnote');
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
