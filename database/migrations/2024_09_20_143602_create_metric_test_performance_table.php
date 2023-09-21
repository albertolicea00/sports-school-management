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
        Schema::create('metric_test_performance', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->json('tests')->nullable();
            $table->json('meta')->nullable();
            $table->timestamps();
        });
        Schema::create('metric_test_performance_fields', function (Blueprint $table) {
            $table->id();
            $table->json('norm_scores')->nullable();
            $table->json('standard_scores')->nullable();
            $table->string('unit')->nullable();
            $table->string('name');
            $table->string('about')->nullable();
            $table->boolean('enable')->default(1);
            $table->json('meta')->nullable();
            $table->timestamps();
        });

        Schema::create('metric_test_performance_has_fields', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('metric_id');
            $table->unsignedBigInteger('filed_id');
            $table->timestamps();

            $table->foreign('metric_id')->references('id')->on('metric_test_performance')->constrained();
            // ->onUpdate('cascade')
            // ->onDelete('cascade');
            $table->foreign('filed_id')->references('id')->on('metric_test_performance_fields')->constrained();
            // ->onUpdate('cascade')
            // ->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('metric_test_performance');
        Schema::dropIfExists('metric_test_performance_fields');
        Schema::dropIfExists('metric_test_performance_has_fields');    }
};
