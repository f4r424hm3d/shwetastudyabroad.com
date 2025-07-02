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
    Schema::table('students', function (Blueprint $table) {
      $table->string('degree_planning_to_study', 100)->nullable()->after('visa_note');
      $table->string('year_planning_to_study', 20)->nullable()->after('degree_planning_to_study');
      $table->string('intrested_in_paid_counselling', 50)->nullable()->after('year_planning_to_study');
      $table->date('preferred_counselling_date')->nullable()->after('intrested_in_paid_counselling');
      $table->time('preferred_counselling_time')->nullable()->after('preferred_counselling_date');
      $table->string('study_abroad_journey_status', 200)->nullable()->after('preferred_counselling_time');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('students', function (Blueprint $table) {
      //
    });
  }
};
