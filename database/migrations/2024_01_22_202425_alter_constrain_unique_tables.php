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
        Schema::table('directors', function (Blueprint $table) {
            $table->string('director')->unique()->change();
            $table->string('slug')->unique()->nullable('false');
        });
        Schema::table('genders', function (Blueprint $table) {
            $table->string('gender')->unique()->change();
            $table->string('slug')->unique()->nullable('false');
        });
        Schema::table('studios', function (Blueprint $table) {
            $table->string('studio')->unique()->change();
            $table->string('slug')->unique()->nullable('false');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
