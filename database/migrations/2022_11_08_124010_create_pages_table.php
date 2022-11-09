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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');

            $table->unsignedBigInteger('main_content_color')->default(1);

            $table->text('introduction_header_title')->nullable()->default(null);
            $table->text('introduction_content_text')->nullable()->default(null);
            $table->unsignedBigInteger('introduction_content_color')->default(2);
            $table->string('introduction_content_image')->nullable()->default(null);
            $table->unsignedBigInteger('introduction_content_layout')->default(1);

            $table->text('qualities_header_title')->nullable()->default(null);
            $table->text('qualities_content_text')->nullable()->default(null);
            $table->unsignedBigInteger('qualities_content_color')->default(3);
            $table->string('qualities_content_image')->nullable()->default(null);
            $table->unsignedBigInteger('qualities_content_layout')->default(1);

            $table->text('motives_header_title')->nullable()->default(null);
            $table->text('motives_content_text')->nullable()->default(null);
            $table->unsignedBigInteger('motives_content_color')->default(4);
            $table->string('motives_content_image')->nullable()->default(null);
            $table->unsignedBigInteger('motives_content_layout')->default(1);

            $table->text('exploration_header_title')->nullable()->default(null);
            $table->text('exploration_content_text')->nullable()->default(null);
            $table->unsignedBigInteger('exploration_content_color')->default(5);
            $table->string('exploration_content_image')->nullable()->default(null);
            $table->unsignedBigInteger('exploration_content_layout')->default(1);

            $table->text('experience_header_title')->nullable()->default(null);
            $table->text('experience_content_text')->nullable()->default(null);
            $table->unsignedBigInteger('experience_content_color')->default(6);
            $table->string('experience_content_image')->nullable()->default(null);
            $table->unsignedBigInteger('experience_content_layout')->default(1);

            $table->text('networks_header_title')->nullable()->default(null);
            $table->text('networks_content_text')->nullable()->default(null);
            $table->unsignedBigInteger('networks_content_color')->default(7);
            $table->string('networks_content_image')->nullable()->default(null);
            $table->unsignedBigInteger('networks_content_layout')->default(1);

            $table->timestamps();

            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->dropForeign(['student_id']);
        });

        Schema::dropIfExists('pages');
    }
};