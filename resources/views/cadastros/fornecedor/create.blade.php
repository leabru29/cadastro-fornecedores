@extends('adminlte::page')

@section('title', 'Cadastro de Fornecedores')

@section('content_header')
    <h1>Cadastro de Fornecedor</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('fornecedores.index') }}" class="btn btn-success"><i class="fa fa-back"></i> Voltar</a>
        </div>
        <div class="card-body">
            <form action="{{ route('fornecedores.store') }}" method="post">
                @csrf
                @include('cadastros.fornecedor.formulario')
                <div class="row mt-3">
                    <div class="col-12 d-flex justify-content-center align-items-center">
                        <button type="submit" class="btn btn-success btn-salvar">Cadastrar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        $(document).ready(function() {
            var SPMaskBehavior = function(val) {
                    return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
                },
                spOptions = {
                    onKeyPress: function(val, e, field, options) {
                        field.mask(SPMaskBehavior.apply({}, arguments), options);
                    }
                };

            $('#tel_res').mask(SPMaskBehavior, spOptions);
            $('#tel_1').mask(SPMaskBehavior, spOptions);
            $('#tel_2').mask(SPMaskBehavior, spOptions);
            $('#cep').mask('00000-000');

            function limpa_formulário_cep() {
                // Limpa valores do formulário de cep.
                $("#rua").val("");
                $("#bairro").val("");
                $("#cidade").val("");
                $("#uf").val("");
                $("#ibge").val("");
            }

            //Quando o campo cep perde o foco.
            $("#cep").blur(function() {

                //Nova variável "cep" somente com dígitos.
                var cep = $(this).val().replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if (validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#rua").val("...");
                        $("#bairro").val("...");
                        $("#cidade").val("...");

                        //Consulta o webservice viacep.com.br/
                        $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function(dados) {

                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#logradouro").val(dados.logradouro);
                                $('#complemento').val(dados.complemento);
                                $("#bairro").val(dados.bairro);
                                $("#cidade").val(dados.localidade);
                            } //end if.
                            else {
                                //CEP pesquisado não foi encontrado.
                                limpa_formulário_cep();
                                alert("CEP não encontrado.");
                            }
                        });
                    } //end if.
                    else {
                        //cep é inválido.
                        limpa_formulário_cep();
                        alert("Formato de CEP inválido.");
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_cep();
                }
            });
        });
    </script>
@stop
