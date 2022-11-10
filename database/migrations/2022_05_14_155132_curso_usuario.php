<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CursoUsuario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curso_usuario', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_curso')
                    ->nullable()
                    ->constrained('cursos')
                    ->cascadeOnUpdate()
                    ->nullOnDelete();

                    $table->foreignId('id_user')
                    ->nullable()
                    ->constrained('users')
                    ->cascadeOnUpdate()
                    ->nullOnDelete();

            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('curso_usuario');

    }
}
