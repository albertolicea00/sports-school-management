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
            $table->unsignedBigInteger('sport_id');
            $table->json('meta')->nullable();
            $table->timestamps();

            $table->foreign('sport_id')->references('id')->on('sports')->constrained();
        });
        Schema::create('metric_test_performance_in_school_grades', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('school_grade_id');
            $table->unsignedBigInteger('metric_id')->nullable();

            $table->foreign('school_grade_id')->references('id')->on('school_grades')->constrained();
            $table->foreign('metric_id')->references('id')->on('metric_test_performance')->constrained();
            $table->timestamps();
        });



        Schema::create('metric_test_performance_fields', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('unit')->nullable();
            $table->string('measure')->nullable();
            $table->string('about')->nullable();
            $table->boolean('enable')->default(0);
            $table->json('meta')->nullable();
            $table->timestamps();
        });
        Schema::create('metric_test_performance_field_norms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('field_id');
            $table->json('norm_scores')->nullable();
            $table->json('standard_scores')->nullable();
            $table->boolean('enable')->default(1);
            $table->json('meta')->nullable();
            $table->timestamps();

            $table->foreign('field_id')->references('id')->on('metric_test_performance_fields')->constrained();
            // ->onUpdate('cascade')
            // ->onDelete('cascade');
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
