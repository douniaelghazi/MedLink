<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('clients', function (Blueprint $table) {

            $table->unsignedBigInteger('id_client')->primary();

            $table->foreign('id_client')
                ->references('id')
                ->on('users')
                ->cascadeOnDelete();

            $table->string('telephone');
            $table->string('nom_etablissement');
            $table->string('type_etablissement');
            $table->string('adresse');
            $table->string('ville');
            $table->string('email');
            $table->string('logo')->nullable();
            $table->text('description')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};