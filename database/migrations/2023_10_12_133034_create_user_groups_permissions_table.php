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
        Schema::create('user_groups_permissions', function (Blueprint $table) {
            // PK1 permission_id
            $table->foreignId('permission_id')->constrained();
            // PK2 user_group_id
            $table->foreignId('user_group_id')->constrained();
            $table->char('value', 50);
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_groups_permissions');
    }
};
