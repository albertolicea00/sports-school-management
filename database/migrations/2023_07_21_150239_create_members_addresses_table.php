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
        Schema::create('members_addresses', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('member_id');
            $table->unsignedBigInteger('city_id')->nullable();
            $table->unsignedBigInteger('state_id')->nullable();
            // $table->unsignedBigInteger('country_id')->default(53);
            $table->string('location')->nullable();
            $table->string('zip_code')->nullable();
            $table->json('geo')->nullable();
            $table->string('about')->nullable();
            $table->boolean('enable')->default(1);
            $table->json('meta')->nullable();
            $table->timestamps();

            $table->foreign('member_id')->references('id')->on('members')->constrained();
            // ->onUpdate('cascade')
            // ->onDelete('cascade');
            $table->foreign('city_id')->references('id')->on('cities')->constrained();
            // ->onUpdate('cascade')
            // ->onDelete('cascade');
            $table->foreign('state_id')->references('id')->on('states')->constrained();
            // ->onUpdate('cascade')
            // ->onDelete('cascade');
            // $table->foreign('country_id')->references('id')->on('countries')->constrained();
            // ->onUpdate('cascade')
            // ->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members_addresses');
    }
};
