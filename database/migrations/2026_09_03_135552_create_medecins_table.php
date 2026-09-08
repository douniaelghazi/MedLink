<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('medecins', function (Blueprint $table) {

            $table->unsignedBigInteger('id_medecin')->primary();

            $table->foreign('id_medecin')
                ->references('id')
                ->on('users')
                ->cascadeOnDelete();

            $table->string('Photo_de_profil')->nullable();
            $table->string('nom_complet');
            $table->string('email');
            $table->string('telephone');
            $table->string('ville');
            $table->string('experience')->nullable();
            $table->string('diplome')->nullable();
            $table->string('CV')->nullable();
            $table->boolean('disponibilite')->default(true);
            $table->text('description_professionnelle')->nullable();

            $table->unsignedBigInteger('id_specialite');

            $table->foreign('id_specialite')
                ->references('id_specialite')
                ->on('specialites')
                ->cascadeOnDelete();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('medecins');
    }
};