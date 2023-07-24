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
        Schema::create('countries', function (Blueprint $table) {
            $table->id('id');
            $table->string("name");
            $table->string("iso3")->nullable();
            $table->string("iso2")->nullable();
            $table->string("numeric_code")->nullable();
            $table->string("phone_code")->nullable();
            $table->string("capital")->nullable();
            $table->string("currency")->nullable();
            $table->string("currency_name")->nullable();
            $table->string("currency_symbol")->nullable();
            $table->string("tld")->nullable();
            $table->string("native")->nullable();
            $table->string("region")->nullable();
            $table->string("subregion")->nullable();
            $table->json("timezones")->nullable();
            $table->json("translations")->nullable();
            $table->string("latitude")->nullable();
            $table->string("longitude")->nullable();
            $table->string("emoji")->nullable();
            $table->string("emojiU")->nullable();
            $table->boolean("enable")->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('countries');
    }
};
