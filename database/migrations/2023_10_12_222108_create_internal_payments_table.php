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
        Schema::create('internal_payments', function (Blueprint $table) {
            $table->id();
            // FK1 - CRIA A CHAVE internal_contact_id
            $table->unsignedBigInteger('internal_contact_id')->unsigned();
            // FK1 - REFERENCIA A CHAVE internal_contact_id
            $table->foreign('internal_contact_id')->references('id')->on('internal_contacts')->onDelete('cascade');
            $table->date('due_date');
            $table->date('payment_date');
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('internal_payments');
    }
};
