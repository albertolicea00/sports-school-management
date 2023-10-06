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
        Schema::create('metric_model_categories', function (Blueprint $table) {
            $table->id();
            $table->string('icon');
            $table->string('name');
            $table->string('route');
            $table->string('about')->nullable();
            $table->string('meta')->nullable();
            $table->boolean('enable')->default(1);
            $table->timestamps();
        });
        Schema::create('metric_models', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sport_id')->nullable();
            $table->string('route');
            $table->string('table');
            $table->string('model');
            $table->string('component')->nullable();
            $table->unsignedBigInteger('model_id')->nullable();
            $table->string('color');
            $table->string('icon');
            $table->string('name_s');
            $table->string('name_p');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->string('about')->nullable();
            $table->string('meta')->nullable();
            $table->boolean('enable')->default(1);

            $table->foreign('sport_id')->references('id')->on('sports')->constrained();
            // ->onUpdate('cascade')
            // ->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('metric_model_categories')->constrained();
            // ->onUpdate('cascade')
            // ->onDelete('cascade');
            $table->timestamps();
        });

        // CLASIFIQUE BY AGE RANGE
        Schema::create('school_grades_has_metrics', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('school_grade_id');
            $table->unsignedBigInteger('metric_model_id')->nullable();

            $table->foreign('school_grade_id')->references('id')->on('school_grades')->constrained();
            // ->onUpdate('cascade')
            // ->onDelete('cascade');
            $table->foreign('metric_model_id')->references('id')->on('metric_models')->constrained();
            // ->onUpdate('cascade')
            // ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('metric_model_categories');
        Schema::dropIfExists('metric_models');
        Schema::dropIfExists('school_grades_has_metrics');
    }
};
