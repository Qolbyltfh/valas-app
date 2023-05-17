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
        Schema::create('valas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nama_valas');
            $table->integer('nilai_jual')->default(0);
            $table->integer('nilai_beli')->default(0);
            $table->date('tanggal_rate');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('valas');
    }
};
