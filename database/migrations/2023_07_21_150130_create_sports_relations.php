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
        Schema::create('members_has_sports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('member_id');
            $table->unsignedBigInteger('sport_id');
            $table->string('about')->nullable();
            $table->boolean('enable')->default(1);
            $table->json('meta')->nullable();
            $table->timestamps();

            $table->foreign('member_id')->references('id')->on('members')->constrained();
            // ->onUpdate('cascade')
            // ->onDelete('cascade');
            $table->foreign('sport_id')->references('id')->on('sports')->constrained();
            // ->onUpdate('cascade')
            // ->onDelete('cascade');
        });
        Schema::create('athletes_has_sports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('athlete_id');
            $table->unsignedBigInteger('sport_id');
            $table->float('exp_years')->nullable();
            // poner las posicion y bla bla bla en que juega el player en ese deporte (que seguro esta asociado al nivel escolar del mismo)
            $table->string('about')->nullable();
            $table->boolean('enable')->default(1);
            $table->json('meta')->nullable();
            $table->timestamps();

            $table->foreign('athlete_id')->references('id')->on('athletes')->constrained();
            // ->onUpdate('cascade')
            // ->onDelete('cascade');
            $table->foreign('sport_id')->references('id')->on('sports')->constrained();
            // ->onUpdate('cascade')
            // ->onDelete('cascade');
        });
        Schema::create('coaches_has_sports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('coache_id');
            $table->unsignedBigInteger('sport_id');
            $table->float('exp_years')->nullable();
            $table->string('about')->nullable();
            $table->boolean('enable')->default(1);
            $table->json('meta')->nullable();
            $table->timestamps();

            $table->foreign('coache_id')->references('id')->on('coaches')->constrained();
            // ->onUpdate('cascade')
            // ->onDelete('cascade');
            $table->foreign('sport_id')->references('id')->on('sports')->constrained();
            // ->onUpdate('cascade')
            // ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members_has_sports');
        Schema::dropIfExists('athletes_has_sports');
        Schema::dropIfExists('coaches_has_sports');
    }
};
