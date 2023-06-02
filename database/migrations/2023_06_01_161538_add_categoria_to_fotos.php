<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCategoriaToFotos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fotos', function (Blueprint $table) {
            $table->foreignId('id_categoria')
                ->nullable()
                ->constrained('categorias')
                ->cascadeOnUpdate()
                ->nullOnDelete();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fotos', function (Blueprint $table) {
            $table->dropColumn('id_categoria');
        });
    }
}
