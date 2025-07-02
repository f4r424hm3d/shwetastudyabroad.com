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
    Schema::table('university_programs', function (Blueprint $table) {
      $table->decimal('ielts')->nullable()->after('entry_requirement');
      $table->decimal('toefl')->nullable()->after('ielts');
      $table->decimal('pte')->nullable()->after('toefl');
      $table->decimal('duolingo')->nullable()->after('pte');
      $table->decimal('gre')->nullable()->after('duolingo');
      $table->decimal('gmat')->nullable()->after('gre');
      $table->decimal('sat')->nullable()->after('gmat');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('university_programs', function (Blueprint $table) {
      //
    });
  }
};
