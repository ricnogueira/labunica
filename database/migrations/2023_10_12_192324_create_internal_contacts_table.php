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
        $precision = 0;
        Schema::create('internal_contacts', function (Blueprint $table) {
            $table->id();
            // FK1 - CRIA A CHAVE company_id
            $table->unsignedBigInteger('company_id')->unsigned();
            // FK1 - REFERENCIA A CHAVE company_id
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            // FK2 - CRIA A CHAVE user_id
            $table->unsignedBigInteger('user_id')->unsigned();
            // FK2 - REFERENCIA A CHAVE user_id
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamp('signed_at', $precision = 0)->nullable();
            $table->timestamp('expires_at', $precision = 0)->nullable(); //nullableTimetamps
            $table->text('term_accepted');
            $table->enum('status', ['on', 'off']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('internal_contacts');
    }
};
