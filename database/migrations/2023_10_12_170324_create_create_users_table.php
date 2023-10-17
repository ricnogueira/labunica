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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            // FK 1 - CRIA A CHAVE company_id
            $table->unsignedBigInteger('company_id')->unsigned();
            // FK 1 - REFERENCIA A CHAVE company_id
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            // FA 2 - CRIA A CHAVE user_group_id
            $table->unsignedBigInteger('user_group_id')->unsigned();
            // FA 2 - REFERENCIA A CHAVE user_group_id
            $table->foreign('user_group_id')->references('id')->on('user_groups')->onDelete('cascade');
            
            $table->char('name', 50);
            //$table->string('email')->unique();
            //$table->timestamp('email_verified_at')->nullable();
            //$table->string('password');
            //$table->rememberToken();
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
