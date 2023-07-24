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
        Schema::create('genders_has_titles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('gender_id');
            $table->unsignedBigInteger('title_id');
            $table->timestamps();

            $table->foreign('gender_id')->references('id')->on('genders')->constrained();
            $table->foreign('title_id')->references('id')->on('titles')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('genders_has_titles');
    }
};
