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
        Schema::create('videos', function (Blueprint $table) {
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
            $table->boolean('watched')->default(false);
            $table->longText('notes');
            $table->boolean('active')->default(true);
            $table->foreignId('directors_id')->constrained();
            $table->foreignId('studios_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('videos');
    }
};
