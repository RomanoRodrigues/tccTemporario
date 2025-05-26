<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id('id_paciente'); // ID com nome personalizado
            $table->string('nome', 255);
            $table->string('telefone', 20);
            $table->string('email', 255)->unique();
            $table->string('endereco', 255);
            $table->string('cpf', 14)->unique();
            $table->string('senha', 255);
            $table->timestamps(); // created_at e updated_at 
            $table->softDeletes(); // deleted_at (para soft deletes)
        });
    }

    public function down()
    {
        Schema::dropIfExists('pacientes');
    }
};