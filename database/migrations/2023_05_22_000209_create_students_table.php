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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('email')->unique();
            $table->string('senha');
            $table->string('cpf');
            $table->string('pcd')->nullable();
            $table->date('data_nascimento');
            $table->string('idade');
            $table->string('responsavel');
            $table->string('contato_responsavel');
            $table->string('endereco');
            $table->string('cidade');
            $table->string('estado');
            $table->string('cep');
            $table->string('nota')->nullable();
            $table->string('frequencia')->nullable();
            $table->string('foto')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
