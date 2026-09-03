<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('freelances', function (Blueprint $table) {

            $table->unsignedBigInteger('id_freelance')->primary();

            $table->foreign('id_freelance')
                ->references('id')
                ->on('users')
                ->cascadeOnDelete();

            $table->string('telephone');
            $table->string('adresse');
            $table->string('ville');
            $table->text('description')->nullable();
            $table->string('cv')->nullable();

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
        Schema::dropIfExists('freelances');
    }
};