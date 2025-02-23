<?php

use App\Models\Autor;
use App\Models\Editora;
use App\Models\Genero;
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
        Schema::create('livro_fisicos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->foreignIdFor(Autor::class, )->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Genero::class, )->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Editora::class, )->constrained()->cascadeOnDelete()->nullable();
            $table->string('edicao')->nullable();
            $table->string('ano')->nullable();
            $table->string('capa')->nullable();
            $table->integer('quantidade')->default(1);
            $table->enum('destinatario', ['Todos', 'Professores'])->default('Todos');
            $table->enum('estado', ['Disponível', 'Reservado', 'Emprestado'])->default('Disponível');
            $table->text('descricao')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livro_fisicos');
    }
};
