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
            $table->date('dt_nasc')->nullable()->comment('Data de Nascimento (PF)');
            $table->string('rg')->nullable()->comment('RG');
            $table->string('insc_est')->nullable()->comment('Inscrição Estadual');
            $table->string('nome_res')->nullable()->comment('Nome do Responsável');
            $table->string('tel_res')->nullable()->comment('Telefone do Responsável');
            $table->string('logradouro')->comment('Endereço');
            $table->string('numero')->default(0)->comment('Se não for fornecido um número será 0 para sem número');
            $table->string('complemento')->nullable()->comment('Complemento não obrigatório');
            $table->string('bairro')->comment('Bairro');
            $table->string('cidade')->comment('Cidade');
            $table->string('cep')->comment('CEP');
            $table->string('tel_1')->comment('Telefone 1');
            $table->string('tel_2')->nullable()->comment('Telefone 2 não obrigatório');
            $table->string('email')->comment('E-mail para cadastro');
            $table->string('site')->nullable()->comment('Site');
            $table->string('observacoes')->nullable();
            $table->softDeletes($column = 'deleted_at');
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