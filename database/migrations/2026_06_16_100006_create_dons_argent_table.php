<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('dons_argent', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('email');
            $table->decimal('montant', 8, 2);
            $table->text('message')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dons_argent');
    }
};
