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
        Schema::create('teams', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('about')->nullable();
            $table->boolean('enable')->default(1);
            $table->json('meta')->nullable();
            $table->timestamps();
        });
        Schema::create('school_grades', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('age');
            $table->string('mix_range');
            $table->string('max_range');
            $table->string('about')->nullable();
            $table->boolean('enable')->default(1);
            $table->json('meta')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teams');
        Schema::dropIfExists('school_grades');
    }
};
