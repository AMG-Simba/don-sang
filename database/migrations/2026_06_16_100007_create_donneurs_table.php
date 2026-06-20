<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('donneurs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->string('nom');
            $table->string('prenom');
            $table->string('cin')->unique();
            $table->string('sexe');
            $table->date('date_naissance');
            $table->string('groupe_sanguin');
            $table->string('ville');
            $table->string('telephone');
            $table->string('email')->nullable();
            $table->decimal('taux_hemoglobine', 4, 1)->nullable();
            $table->string('tension')->nullable();
            $table->integer('poids')->nullable();
            $table->text('maladies_chroniques')->nullable();
            $table->date('date_prochain_don')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('donneurs');
    }
};
