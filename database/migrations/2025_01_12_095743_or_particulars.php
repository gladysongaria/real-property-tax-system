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
        Schema::create('or_particulars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('or_id')->constrained('official_receipts')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('property_id')->constrained('properties')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('term')->nullable();
            $table->integer('to')->nullable();
            $table->decimal('tax_due', 12, 2)->nullable(); // Changed to decimal
            $table->decimal('penalty', 12, 2)->nullable(); // Changed to decimal
            $table->decimal('discount', 12, 2)->nullable();
            $table->string('inclusive_years')->nullable();
            $table->decimal('customer_penalty', 12, 2)->nullable();
            $table->integer('customer_last_term')->nullable();
            $table->decimal('total_tax_due', 12, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('or_particulars');
    }
};
