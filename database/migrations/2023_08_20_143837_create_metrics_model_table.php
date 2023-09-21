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
        Schema::create('metrics_model', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sport_id');
            $table->string('table');
            $table->string('model');
            $table->unsignedBigInteger('model_id');
            $table->string('icon');
            $table->string('name_s');
            $table->string('name_p');

            $table->foreign('sport_id')->references('id')->on('sports')->constrained();
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
            $table->foreign('metric_model_id')->references('id')->on('metrics_model')->constrained();
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
        Schema::dropIfExists('metrics_model');
        Schema::dropIfExists('school_grades_has_metrics');
    }
};
