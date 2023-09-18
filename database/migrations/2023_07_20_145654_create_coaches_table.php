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
        Schema::create('coaches', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('member_id');
            $table->string('about')->nullable();
            $table->boolean('enable')->default(1);
            // $table->json('states')->nullable();
            $table->json('meta')->nullable();
            $table->timestamps();

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
        Schema::dropIfExists('coaches');
    }
};
