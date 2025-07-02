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
          $table->json('exam_accepted')->nullable()->after('course_mode');
          $table->json('intake')->nullable()->after('exam_accepted');
          $table->json('application_deadline')->nullable()->after('intake');
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
