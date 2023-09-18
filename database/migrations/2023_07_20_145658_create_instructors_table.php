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
        Schema::create('instructors_type', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('about')->nullable();
            $table->boolean('enable')->default(1);
            $table->json('meta')->nullable();
            $table->timestamps();
        });

        Schema::create('instructors', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('member_id');
            $table->unsignedBigInteger('instructor_type_id');
            $table->string('about')->nullable();
            $table->boolean('enable')->default(1);
            // $table->json('states')->nullable();;
            $table->json('meta')->nullable();
            $table->timestamps();

            $table->foreign('instructor_type_id')->references('id')->on('instructors_type')->constrained();
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
        Schema::dropIfExists('instructors_type');
        Schema::dropIfExists('instructors');
    }
};
