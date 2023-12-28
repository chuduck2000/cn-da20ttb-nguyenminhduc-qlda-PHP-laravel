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
        Schema::create('thuc_hien_doans', function (Blueprint $table) {
            $table->id();
            $table->string('doan_id')->unique()->nullable();
            $table->string('namhoc_id')->unique()->nullable();
            $table->string('MSGV')->unique()->nullable();
            $table->string('MSSV')->unique()->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('thuc_hien_doans');
    }
};
