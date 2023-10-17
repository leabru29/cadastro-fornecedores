@extends('adminlte::page')

@section('title', 'Editar de Fornecedor')

@section('content_header')
    <h1>Editar de Fornecedor {{ $fornecedor->nome }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('fornecedores.index') }}" class="btn btn-success"><i class="fa fa-back"></i> Voltar</a>
        </div>
        <div class="card-body">
            <form action="{{ route('fornecedores.update', $fornecedor->id) }}" method="post">
                @method('put')
                @csrf
                @include('cadastros.fornecedor.formulario')
                <div class="row mt-3">
                    <div class="col-12 d-flex justify-content-center align-items-center">
                        <button type="submit" class="btn btn-success btn-salvar">Editar</button>
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

            var id = "{{ $fornecedor->id }}";
            var url = '{{ url('fornecedores') }}/' + id;

            $.get(url, function(response) {
                $('#nome').val(response.nome);
                $('#razao_social').val(response.razao_social);
                $('#tipo_pessoa').val(response.tipo_pessoa);
                $('#dt_nasc').val(response.dt_nasc);
                $('#rg').val(response.rg);
                $('#insc_est').val(response.insc_est);
                $('#nome_res').val(response.nome_res);
                $('#tel_res').val(response.tel_res);
                $('#logradouro').val(response.logradouro);
                $('#numero').val(response.numero);
                $('#complemento').val(response.complemento);
                $('#bairro').val(response.bairro);
                $('#cidade').val(response.cidade);
                $('#cep').val(response.cep);
                $('#tel_1').val(response.tel_1);
                $('#tel_2').val(response.tel_2);
                $('#email').val(response.email);
                $('#site').val(response.site);
                $('#observacoes').val(response.observacoes);

                console.log(response);
            });

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
