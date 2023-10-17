@extends('adminlte::page')

@section('title', 'Lista de Fornecedores')

@section('content_header')
    <h1>Lista de Fornecedores</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table id="lista_fornecedores" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Razão Social</th>
                        <th>Data de Nascimento</th>
                        <th>RG</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
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
        $(document).ready(function() {
            $('#lista_fornecedores').DataTable();
        });
    </script>
@stop
