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
        Schema::create('patient_details', function (Blueprint $table) {
            $table->id();
            // FK1 - CRIA A CHAVE patient_id
            $table->unsignedBigInteger('patient_id')->unsigned();
            // FK1 - REFERENCIA A CHAVE patient_id
            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
            // FK1 - CRIA A CHAVE user_id
            $table->unsignedBigInteger('user_id')->unsigned();
            // FK1 - REFERENCIA A CHAVE user_id
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            
            $table->decimal('weight')->nullable();
            $table->decimal('height')->nullable();
            $table->char('skin_color', 15)->nullable();
            $table->char('eye_color', 15)->nullable();
            $table->char('overall_condition', 50)->nullable();
            $table->char('extra_information', 50)->nullable();
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patient_details');
    }
};
