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
      $table->string('father', 100)->after('zip_code')->nullable();
      $table->string('father_mobile', 100)->after('father')->nullable();
      $table->string('mother', 100)->after('father_mobile')->nullable();
      $table->string('mother_mobile', 100)->after('mother')->nullable();
      $table->string('grading_scheme', 100)->after('mother_mobile')->nullable();
      $table->string('grade_average', 100)->after('grading_scheme')->nullable();
      $table->string('english_exam_type', 100)->after('grade_average')->nullable();
      $table->string('date_of_exam', 100)->after('english_exam_type')->nullable();
      $table->string('listening_score', 100)->after('date_of_exam')->nullable();
      $table->string('reading_score', 100)->after('listening_score')->nullable();
      $table->string('writing_score', 100)->after('reading_score')->nullable();
      $table->string('speaking_score', 100)->after('writing_score')->nullable();
      $table->string('overall_score', 100)->after('speaking_score')->nullable();
      $table->string('gre', 100)->after('overall_score')->nullable();
      $table->string('gre_exam_date', 100)->after('gre')->nullable();
      $table->string('gre_v_score', 100)->after('gre_exam_date')->nullable();
      $table->string('gre_v_rank', 100)->after('gre_v_score')->nullable();
      $table->string('gre_q_score', 100)->after('gre_v_rank')->nullable();
      $table->string('gre_q_rank', 100)->after('gre_q_score')->nullable();
      $table->string('gre_w_score', 100)->after('gre_q_rank')->nullable();
      $table->string('gre_w_rank', 100)->after('gre_w_score')->nullable();
      $table->string('gmat', 100)->after('gre_w_rank')->nullable();
      $table->string('gmat_exam_date', 100)->after('gmat')->nullable();
      $table->string('gmat_v_score', 100)->after('gmat_exam_date')->nullable();
      $table->string('gmat_v_rank', 100)->after('gmat_v_score')->nullable();
      $table->string('gmat_q_score', 100)->after('gmat_v_rank')->nullable();
      $table->string('gmat_q_rank', 100)->after('gmat_q_score')->nullable();
      $table->string('gmat_w_score', 100)->after('gmat_q_rank')->nullable();
      $table->string('gmat_w_rank', 100)->after('gmat_w_score')->nullable();
      $table->string('gmat_ir_score', 100)->after('gmat_w_rank')->nullable();
      $table->string('gmat_ir_rank', 100)->after('gmat_ir_score')->nullable();
      $table->string('gmat_total_score', 100)->after('gmat_ir_rank')->nullable();
      $table->string('gmat_total_rank', 100)->after('gmat_total_score')->nullable();
      $table->string('sat', 100)->after('gmat_total_rank')->nullable();
      $table->string('sat_exam_date', 100)->after('sat')->nullable();
      $table->string('sat_reasoning_point', 100)->after('sat_exam_date')->nullable();
      $table->string('sat_subject_point', 100)->after('sat_reasoning_point')->nullable();
      $table->string('refused_visa', 100)->after('sat_subject_point')->nullable();
      $table->string('valid_study_permit', 100)->after('refused_visa')->nullable();
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
