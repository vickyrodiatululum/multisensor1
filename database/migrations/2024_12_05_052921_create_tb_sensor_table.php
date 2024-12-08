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
        Schema::create('tb_sensor', function (Blueprint $table) {
            $table->id();
            $table->float('train1')->nullable();
            $table->float('train2')->nullable();
            $table->float('train3')->nullable();
            $table->float('train4')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_sensor');
    }
};
