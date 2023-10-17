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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            // FK1 - CRIA A CHAVE business_id
            $table->unsignedBigInteger('business_id')->unsigned();
            // FK1 - REFERENCIA A CHAVE business_id 
            $table->foreign('business_id')->references('id')->on('businesses')->onDelete('cascade');
            // FK2 - CRIA A CHAVE patient_type_id
            $table->unsignedBigInteger('patient_type_id')->unsigned();
            // FK2 - REFERENCIA A CHAVE patient_type_id
            $table->foreign('patient_type_id')->references('id')->on('patient_types')->onDelete('cascade');
            
            $table->char('name', 50);
            $table->date('birthday');
            $table->char('document', 14);
            $table->char('identity', 20);
            $table->char('address', 30)->nullable();
            $table->char('address_number', 10)->nullable();
            $table->char('neighborhood', 100)->nullable();
            $table->char('city', 100)->nullable();
            $table->char('city_code', 10)->nullable();
            $table->char('state', 2)->nullable();
            $table->char('postal_code', 10)->nullable();
            $table->char('complement', 50)->nullable();
            $table->char('responsible_name', 50)->nullable();
            $table->char('responsible_document', 14)->nullable();
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
