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
        Schema::create('lampu_u_v_s', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_lampu');
            $table->date('tanggal');
            $table->date('usia_lampu')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lampu_u_v_s');
    }
};
