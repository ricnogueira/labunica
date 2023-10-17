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
        Schema::create('businesses', function (Blueprint $table) {
            $table->id();
            // PK1 - company_id CRIA O CHAVE
            $table->unsignedBiginteger('company_id')->unsigned();
            // PK2 - business_types_id - CRIA A CHAVE
            $table->unsignedBiginteger('business_types_id')->unsigned();
            // PK1 - company_id REFERENCIA A CHAVE
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            // PK2 - business_types_id REFERENCIA A CHAVE
            $table->foreign('business_types_id')->references('id')->on('business_types')->onDelete('cascade');

            $table->char('business_name', 150);
            $table->char('fantasy_name', 150);
            $table->char('document', 14);
            $table->char('municipal_inscription', 20);
            $table->char('state_inscription', 20);
            $table->char('address', 255)->nullable();
            $table->char('address_number', 10)->nullable();
            $table->char('neighborhood', 100)->nullable();
            $table->char('city', 100)->nullable();
            $table->char('city_code', 10)->nullable();
            $table->char('state', 2)->nullable();
            $table->char('postal_code', 10)->nullable();
            $table->char('complement', 50)->nullable();
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('businesses');
    }
};
