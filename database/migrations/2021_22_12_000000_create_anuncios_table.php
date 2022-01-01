<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnunciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anuncios', function (Blueprint $table) {
            $table->id();
            $table->string('titulo')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('descricao')->nullable();
            $table->integer('idEmpresa')->nullable();
            $table->string('tipo')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->string('regiao')->nullable();
            $table->string('localidade')->nullable();
            $table->string('contactos')->nullable();
            $table->string('habilitacoes minimas')->nullable();
            $table->string('setorAtividade')->nullable();
            

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anuncios');
    }
}
