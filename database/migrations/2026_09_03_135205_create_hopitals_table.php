<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('hopitals', function (Blueprint $table) {

            $table->unsignedBigInteger('id_hopital')->primary();

            $table->foreign('id_hopital')
                ->references('id')
                ->on('users')
                ->cascadeOnDelete();

            $table->string('nom');
            $table->string('type');
            $table->string('adresse');
            $table->text('description')->nullable();
            $table->string('logo')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hopitals');
    }
};