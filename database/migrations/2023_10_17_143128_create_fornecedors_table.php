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
        Schema::create('fornecedors', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('nome')->comment('Nome Fantasia/Nome Completo');
            $table->string('razao_social')->comment('Razão Social');
            $table->enum('tipo_pessoa', ['PF', 'PJ'])->comment('Tipo Pessoa (PF PJ)');
            $table->date('dt_nasc')->comment('Data de Nascimento (PF)');
            $table->bigInteger('rg')->comment('RG');
            $table->integer('insc_est')->comment('Inscrição Estadual');
            $table->string('nome_res')->comment('Nome do Responsável');
            $table->integer('tel_res')->comment('Telefone do Responsável');
            $table->string('logradouro')->comment('Endereço');
            $table->integer('numero')->default(0)->comment('Se não for fornecido um número será 0 para sem número');
            $table->string('complemento')->nullable()->comment('Complemento não obrigatório');
            $table->string('bairro')->comment('Bairro');
            $table->string('cidade')->comment('Cidade');
            $table->integer('cep')->comment('CEP');
            $table->integer('tel_1')->comment('Telefone 1');
            $table->integer('tel_2')->nullable()->comment('Telefone 2 não obrigatório');
            $table->string('email')->comment('E-mail para cadastro');
            $table->string('site')->comment('Site');
            $table->string('observacoes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fornecedors');
    }
};