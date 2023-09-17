<?php

use App\Models\Athlete;
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
        Schema::create('coaches_has_athetes', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('athlete_id');
            $table->unsignedBigInteger('coach_id');
            $table->string('about')->nullable();
            $table->boolean('enable')->default(1);
            $table->json('meta')->nullable();
            $table->timestamps();

            $table->foreign('athlete_id')->references('id')->on('athletes')->constrained();
            // ->onUpdate('cascade')
            // ->onDelete('cascade');
            $table->foreign('coach_id')->references('id')->on('coaches')->constrained();
            // ->onUpdate('cascade')
            // ->onDelete('cascade');
        });
        Schema::create('coaches_has_teams', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('athlete_id');
            $table->unsignedBigInteger('coach_id');
            $table->string('about')->nullable();
            $table->boolean('enable')->default(1);
            $table->json('meta')->nullable();
            $table->timestamps();

            $table->foreign('athlete_id')->references('id')->on('athletes')->constrained();
            // ->onUpdate('cascade')
            // ->onDelete('cascade');
            $table->foreign('coach_id')->references('id')->on('coaches')->constrained();
            // ->onUpdate('cascade')
            // ->onDelete('cascade');
        });
        Schema::create('coaches_school_grades', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('athlete_id');
            $table->unsignedBigInteger('coach_id');
            $table->string('about')->nullable();
            $table->boolean('enable')->default(1);
            $table->json('meta')->nullable();
            $table->timestamps();

            $table->foreign('athlete_id')->references('id')->on('athletes')->constrained();
            // ->onUpdate('cascade')
            // ->onDelete('cascade');
            $table->foreign('coach_id')->references('id')->on('coaches')->constrained();
            // ->onUpdate('cascade')
            // ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coaches_has_athetes');
        Schema::dropIfExists('coaches_has_teams');
        Schema::dropIfExists('coaches_school_grades');
    }
};
