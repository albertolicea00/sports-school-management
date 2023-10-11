<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // FALTAN ESTOS MODELOS
    public function up(): void
    {
        Schema::create('athetes_made_test_performance', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('athlete_id');
            $table->unsignedBigInteger('coach_id');
            $table->float('made_at')->nullable();
            $table->json('tests');
            $table->string('about')->nullable();
            $table->boolean('enable')->default(1);
            $table->json('meta')->nullable();
            $table->timestamps();

            $table->foreign('athlete_id')->references('id')->on('athletes')->constrained();
            // ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('coach_id')->references('id')->on('coaches')->constrained();
            // ->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('coaches_made_test_performance', function (Blueprint $table) {
            $table->id();
            // falta la parte de la evaluación al  entrenador
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('athetes_made_test_performance');
        Schema::dropIfExists('coaches_made_test_performance');
    }
};
