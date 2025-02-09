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
        Schema::create('tax_payments', function (Blueprint $table) {
            $table->id();
            // $table->foreighId('payor_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->string('or_number');
            $table->date('or_date');
            $table->foreignId('property_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->integer('term');
            $table->integer('to');
            $table->string('issued_to');
            $table->string('issued_by');
            $table->string('tax_due');
            $table->string('overall_total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tax_payments');
    }
};
