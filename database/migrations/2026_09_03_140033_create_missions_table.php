<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('missions', function (Blueprint $table) {

            $table->id('id_mission');

            $table->unsignedBigInteger('id_client');

            $table->unsignedBigInteger('id_specialite');

            $table->string('titre');

            $table->text('description');

            $table->decimal('budget', 10, 2);

            $table->string('ville');

            $table->date('date_debut');

            $table->date('date_fin');

            $table->integer('nombre_poste');

            $table->string('niveau_experience');

            $table->enum('statut', [
                'ouverte',
                'fermee',
                'annulee'
            ])->default('ouverte');

            $table->timestamps();

            $table->foreign('id_client')
                ->references('id_client')
                ->on('clients')
                ->cascadeOnDelete();

            $table->foreign('id_specialite')
                ->references('id_specialite')
                ->on('specialites')
                ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('missions');
    }
};