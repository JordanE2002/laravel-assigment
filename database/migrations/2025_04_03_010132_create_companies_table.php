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
        Schema::create('companies', function (Blueprint $table) {
            
            $table->id();
            $table->string('name'); // Required
            $table->string('email')->unique(); // Required
            $table->string('logo'); // Stores logo path, min size 100x100
            $table->string('website')->nullable(); // Optional website URL
            $table->timestamps();});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
