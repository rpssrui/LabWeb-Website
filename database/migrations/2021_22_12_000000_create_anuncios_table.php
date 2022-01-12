<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnunciosTable extends Migration
{
    /**
     * Run the migrations.s
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anuncios', function (Blueprint $table) {
            $table->id();
            $table->string('titulo')->nullable();
            $table->longText('descricao')->nullable();
            $table->string('tipo')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->string('regiao')->nullable();
            $table->unsignedBigInteger('idEmpresa');
            $table->string('localidade')->nullable();
            $table->string('contactos')->nullable();
            $table->string('habilitacoesMinimas')->nullable();
            $table->string('setorAtividade')->nullable();
            $table->unsignedInteger('nrReports')->nullable();

            $table->foreign('idEmpresa')
                ->references('id')
                ->on('users')
                ->onUpdate('CASCADE')
                ->onDelete('RESTRICT');
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
