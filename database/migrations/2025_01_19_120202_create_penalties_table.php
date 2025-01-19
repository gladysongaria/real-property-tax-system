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
        Schema::create('penalties', function (Blueprint $table) {
            $table->id();
            $table->decimal('term');
            $table->decimal('jan')->nullable();
            $table->decimal('feb')->nullable();
            $table->decimal('mar')->nullable();
            $table->decimal('apr')->nullable();
            $table->decimal('may')->nullable();
            $table->decimal('jun')->nullable();
            $table->decimal('jul')->nullable();
            $table->decimal('aug')->nullable();
            $table->decimal('sept')->nullable();
            $table->decimal('oct')->nullable();
            $table->decimal('nov')->nullable();
            $table->decimal('dec')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penalties');
    }
};
