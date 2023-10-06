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
        Schema::create('athletes', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('member_id');
            $table->unsignedBigInteger('team_id')->nullable();
            $table->unsignedBigInteger('school_grade_id')->nullable();
            $table->string('skin_color')->nullable();
            $table->json('livewiths')->nullable();
            $table->boolean('is_parents_decreased')->default(0);
            $table->string('about')->nullable();
            $table->string('meta')->nullable();
            $table->boolean('enable')->default(1);
            // $table->json('states')->nullable();;
            $table->timestamps();


            $table->foreign('team_id')->references('id')->on('teams')->constrained();
            // ->onUpdate('cascade')
            // ->onDelete('cascade');
            $table->foreign('school_grade_id')->references('id')->on('school_grades')->constrained();
            // ->onUpdate('cascade')
            // ->onDelete('cascade');

            $table->foreign('member_id')->references('id')->on('members')->constrained();
            // ->onUpdate('cascade')
            // ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('athletes');
    }
};
