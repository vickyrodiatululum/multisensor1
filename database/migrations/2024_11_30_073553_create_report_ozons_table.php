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
        Schema::create('report_ozons', function (Blueprint $table) {
            $table->id();
            $table->string('train');
            $table->float('pompa_pre_ozon');
            $table->float('pompa_transfer');
            $table->float('step');
            $table->float('kadar_ozon_static');
            $table->float('kadar_ozon_ft');
            $table->float('kadar_ozon_analyzer');
            $table->float('airflow');
            $table->float('cooling_water');
            $table->float('set_level_ft_middle');
            $table->float('set_level_ft_high');
            $table->float('lampu_uv');
            $table->float('voltase');
            $table->float('ampere');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('report_ozons');
    }
};
