<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('badges', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('description')->nullable();
            $table->integer('condition_nombre');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('badges');
    }
};
