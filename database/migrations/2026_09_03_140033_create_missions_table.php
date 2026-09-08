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

            $table->unsignedBigInteger('id_hopital');

            $table->string('titre');

            $table->text('description');

            $table->string('specialite_recherchee');

            $table->decimal('budget', 10, 2);

            $table->string('ville');

            $table->date('date_debut');

            $table->date('date_fin');

            $table->integer('nombre_de_postes');

            $table->string('niveau_d_experience');

            $table->enum('statut', [
                'ouverte',
                'fermee',
                'annulee'
            ])->default('ouverte');

            $table->timestamps();

            $table->foreign('id_hopital')
                ->references('id_hopital')
                ->on('hopitals')
                ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('missions');
    }
};