@extends('adminlte::page')

@section('title', 'Lista de Fornecedores')

@section('content_header')
    <h1>Lista de Fornecedores</h1>
@stop

@section('content')
    @if (session('message'))
        <div class="alert alert-success message-sucesso">
            {{ session('message') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <a href="{{ route('fornecedores.create') }}" id="btn_adicionar" class="btn btn-success"><i class="fa fa-plus"></i>
                Adicionar</a>
        </div>
        <div class="card-body">
            <table id="lista_fornecedores" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th width="30%">Nome</th>
                        <th width="20%">Razão Social</th>
                        <th width="15%">Tipo de Pessoa</th>
                        <th width="15%">Telefone</th>
                        <th width="20%">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($fornecedores as $fornecedor)
                        <tr>
                            <td>{{ $fornecedor->nome }}</td>
                            <td>{{ $fornecedor->razao_social }}</td>
                            <td>{{ $fornecedor->tipo_pessoa == 'PJ' ? 'Pessoa Jurídica' : 'Pessoa Física' }}</td>
                            <td>{{ $fornecedor->tel_1 }}</td>
                            <td>
                                <a href="{{ route('fornecedores.edit', $fornecedor->id) }}"
                                    class="btn btn-primary">Editar</a>
                                <button type="button" class="btn btn-danger btn-excluir"
                                    data-id="{{ $fornecedor->id }}">Excluir</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function() {
            $('.message-sucesso').fadeOut(10000);
            $('#lista_fornecedores').DataTable({
                'pageLength': 5,
                'aLengthMenu': [
                    [5, 10, 15, -1],
                    [5, 10, 15, "Todos"]
                ],
                order: [
                    [0, 'desc']
                ],

                language: {
                    url: "/js/traducao.json"
                },
            });
        });

        $(document).on('click', '.btn-excluir', function(e) {
            var id = $(this).data('id');

            Swal.fire({
                title: 'Deseja realmente excluir?',
                text: "Esta ação não poderá ser revertida!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sim, pode deletar!'
            }).then((result) => {
                if (result.isConfirmed) {
                    var url = "{{ url('fornecedores') }}/" + id;
                    $.ajax({
                        url: url,
                        method: 'DELETE',
                        dataType: 'json',
                        contentType: 'application/json',
                        info: true,
                        success: function(result) {
                            Swal.fire(
                                'Excluído!',
                                result.message,
                                'success'
                            )
                        },
                        error: function(data) {
                            console.log(data.responseJSON.message);
                        }
                    });
                    $(this).closest('tr').fadeOut(1500);
                }
            });
        });
    </script>
@stop
