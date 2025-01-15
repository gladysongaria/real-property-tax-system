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
        Schema::create('official_receipts', function (Blueprint $table) {
            $table->id();
            $table->integer('or_no')->nullable(); // Fixed typo: 'int' to 'integer'
            $table->date('or_date')->nullable();
            $table->string('issued_to')->nullable();
            $table->string('issued_by')->nullable();
            $table->decimal('amount_paid', 12, 2)->nullable(); // Changed to 'decimal' for numeric accuracy
            $table->decimal('balance', 12, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('official_receipts');
    }
};
