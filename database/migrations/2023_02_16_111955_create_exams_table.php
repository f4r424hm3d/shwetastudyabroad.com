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
        Schema::create('exams', function (Blueprint $table) {
            $table->id();
            $table->text('exam_name');
            $table->text('exam_slug');
            $table->text('title');
            $table->longText('shortnote')->nullable();
            $table->longText('description')->nullable();
            $table->text('thumbnail_name')->nullable();
            $table->text('thumbnail_path')->nullable();
            $table->boolean('status')->default(1);
            $table->boolean('home_view')->default(0);
            $table->text('meta_title')->nullable();
            $table->longText('meta_keyword')->nullable();
            $table->longText('meta_description')->nullable();
            $table->text('page_content')->nullable();
            $table->integer('seo_rating')->nullable();
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
        Schema::dropIfExists('exams');
    }
};
