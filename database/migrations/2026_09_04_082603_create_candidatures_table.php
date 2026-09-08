<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('candidatures', function (Blueprint $table) {

            $table->id('id_candidature');

            $table->string('nom');

            $table->string('CV')->nullable();

            $table->text('message')->nullable();

            $table->date('date_candidature');

            $table->enum('statut', [
                'en_attente',
                'acceptee',
                'refusee',
                'annulee'
            ])->default('en_attente');

            $table->unsignedBigInteger('id_medecin');
            $table->unsignedBigInteger('id_mission');

            $table->timestamps();

            $table->foreign('id_medecin')
                ->references('id_medecin')
                ->on('medecins')
                ->cascadeOnDelete();

            $table->foreign('id_mission')
                ->references('id_mission')
                ->on('missions')
                ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('candidatures');
    }
};