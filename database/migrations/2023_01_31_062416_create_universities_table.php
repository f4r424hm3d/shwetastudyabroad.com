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
        Schema::create('universities', function (Blueprint $table) {
            $table->id();
            $table->string('name',100);
            $table->string('slug',100);
            $table->string('address',200)->nullable();
            $table->string('city',100)->nullable();
            $table->string('state',100)->nullable();
            $table->string('country',100);
            $table->unsignedBigInteger('institute_type_id');
            $table->foreign('institute_type_id')->references('id')->on('institute_types');
            $table->string('founded',100)->nullable();
            $table->integer('world_rank')->nullable();
            $table->string('logo_name',100)->nullable();
            $table->text('logo_path')->nullable();
            $table->string('banner_name',100)->nullable();
            $table->text('banner_path')->nullable();
            $table->text('shortnote')->nullable();
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
        Schema::dropIfExists('universities');
    }
};
