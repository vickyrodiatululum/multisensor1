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
        Schema::create('toggel_sensors', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('train'); // Menyimpan nama train, e.g., 'Train 1'
            $table->string('status')->default(false); // Menyimpan status ON/OFF
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('toggel_sensors');
    }
};
