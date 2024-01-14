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
        Schema::table('videos', function (Blueprint $table) {
            $table->string('original_title')->nullable()->change();;
            $table->longText('sinopse')->nullable()->change();
            $table->enum('type', ['movie', 'web video', 'series'])->nullable()->change();
            $table->decimal('score', 3, 1)->nullable()->change();
            $table->decimal('personal_score', 3, 1)->nullable()->change();
            $table->boolean('watched')->default(false)->nullable()->change();
            $table->longText('notes')->nullable()->change();
            $table->boolean('active')->default(true)->nullable()->change();
            $table->foreignId('directors_id')->nullable()->onDelete('cascate')->change();
            $table->foreignId('studios_id')->nullable()->onDelete('cascate')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('videos', function (Blueprint $table) {
            $table->string('original_title')->nullable(false)->change();;
            $table->longText('sinopse')->nullable(false)->change();
            $table->enum('type', ['movie', 'web video', 'series'])->nullable(false)->change();
            $table->decimal('score', 3, 1)->nullable(false)->change();
            $table->decimal('personal_score', 3, 1)->nullable(false)->change();
            $table->boolean('watched')->default(false)->nullable(false)->change();
            $table->longText('notes')->nullable(false)->change();
            $table->boolean('active')->default(true)->nullable(false)->change();
            $table->foreignId('directors_id')->nullable(false)->change();
            $table->foreignId('studios_id')->nullable(false)->change();
        });
    }
};
