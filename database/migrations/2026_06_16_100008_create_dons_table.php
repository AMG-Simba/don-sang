<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('dons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('donneur_id')->constrained()->cascadeOnDelete();
            $table->foreignId('centre_id')->nullable()->constrained()->nullOnDelete();
            $table->date('date_don');
            $table->string('type_don');
            $table->integer('volume');
            $table->string('statut')->default('en_attente');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dons');
    }
};
