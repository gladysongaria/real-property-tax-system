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
        Schema::create('statuses', function (Blueprint $table) {
            $table->id();
            $table->string('status_name');
        });

        Schema::create('classifications', function (Blueprint $table) {
            $table->id();
            $table->string('classification_name');
        });

        Schema::create('owners', function (Blueprint $table) {
            $table->id();
            $table->string('last_name');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('ext_name')->nullable();
            $table->string('address');
            $table->foreignId('status_id')->constrained('statuses')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('tax_declaration');
            $table->string('location');
            $table->string('barangay');
            $table->foreignId('classification_id')->constrained('classifications')->onDelete('cascade');
            $table->decimal('market_value', 12, 2);
            $table->decimal('assess_value', 12, 2);
            $table->string('sub_class')->nullable();
            $table->string('previous_td')->nullable();  // Previous tax declaration number
            $table->date('date_approved');
            $table->timestamps();
        });

        Schema::create('payment_terms', function (Blueprint $table) {
            $table->id();
            $table->integer('year');
            $table->foreignId('property_id')->constrained()->onDelete('cascade');
            $table->boolean('paid')->default(0); // Default value is 0 (not paid)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('statuses', 'classifications', 'owners', 'properties');
    }
};
