<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('role')->default('Inativo');
            $table->string('img')->nullable();
            $table->string('name');
            $table->string('cpf')->nullable();
            $table->string('date')->nullable();
            $table->string('sexo')->nullable();
            $table->string('matricula')->nullable();
            $table->string('profissao')->nullable();
            $table->string('endereco')->nullable();
            $table->string('email');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
