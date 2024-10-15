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
            $table->string('middle_name');
            $table->string('ext_name');
            $table->string('address');
            $table->foreignId('status_id')->constrained('statuses')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('owner_id')->constrained('owners')->onDelete('cascade');
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
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists( 'statuses', 'classifications','owners', 'properties' );
    }
};
