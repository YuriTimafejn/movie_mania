<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('gender', function (Blueprint $table){
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';

            $table->id();
            $table->string('gender');
            $table->longText('notes');
            $table->boolean('active');
        });
        Schema::create('director', function (Blueprint $table){
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';

            $table->id();
            $table->string('name');
            $table->longText('notes');
            $table->boolean('active');
        });
        Schema::create('studio', function (Blueprint $table){
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';

            $table->id();
            $table->string('studio');
            $table->longText('notes');
            $table->boolean('active');
        });
        Schema::create('video', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';

            $table->id();
            $table->string('title');
            $table->string('original_title');
            $table->longText('sinopse');
            $table->enum('type', ['movie', 'web video', 'series']);
            $table->decimal('score', 3, 1);
            $table->decimal('personal_score', 3, 1);
            $table->longText('notes');
            $table->boolean('active');
            $table->unsignedBigInteger('id_director');
            $table->unsignedBigInteger('id_studio');
            $table->timestamps();

            $table->foreign('id_director')->references('id')->on('director');
            $table->foreign('id_studio')->references('id')->on('studio');

        });
        Schema::create('gender_video', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';

            $table->unsignedBigInteger('id_video');
            $table->unsignedBigInteger('id_gender');
            
            $table->foreign('id_video')->references('id')->on('video');
            $table->foreign('id_gender')->references('id')->on('gender');
        });
        Schema::create('video_images', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';

            $table->unsignedBigInteger('id_video');
            $table->string('url');
            
            $table->foreign('id_video')->references('id')->on('video');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('video');
        Schema::dropIfExists('studio');
        Schema::dropIfExists('director');
        Schema::dropIfExists('gender');
        Schema::dropIfExists('video_images');
        Schema::dropIfExists('gender_video');
    }
};
