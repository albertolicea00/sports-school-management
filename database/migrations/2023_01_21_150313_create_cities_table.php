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
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->unsignedBigInteger("state_id");
            $table->string("state_code")->nullable();
            $table->string("state_name")->nullable();
            $table->unsignedBigInteger("country_id");
            $table->string("country_code")->nullable();
            $table->string("country_name")->nullable();
            $table->string("latitude")->nullable();
            $table->string("longitude")->nullable();
            $table->string("wikiDataId")->nullable();
            $table->boolean("enable")->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cities');
    }
};
