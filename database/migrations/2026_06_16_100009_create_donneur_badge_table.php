<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('donneur_badge', function (Blueprint $table) {
            $table->id();
            $table->foreignId('donneur_id')->constrained()->cascadeOnDelete();
            $table->foreignId('badge_id')->constrained()->cascadeOnDelete();
            $table->date('date_obtention')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('donneur_badge');
    }
};
