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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('dni');
            $table->string('nickname')->nullable();
            $table->string('name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('first_lastname')->nullable();
            $table->string('second_lastname')->nullable();
            $table->date('birth_date')->nullable();
            // $table->unsignedBigInteger('gender_id')->nullable();
            // $table->unsignedBigInteger('title_id')->nullable();
            $table->string('about')->nullable();
            $table->boolean('enable')->default(1);
            // $table->json('states')->nullable();
            $table->json('meta')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};