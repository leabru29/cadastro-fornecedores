<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CadastroFornecedorRequest;
use App\Models\Fornecedor;
use Illuminate\Http\Request;

class ApiFornecedorController extends Controller
{
    /**
     * Lista de Fornecedores
     */
    public function index()
    {
        $fornecedores = Fornecedor::all();
        return $fornecedores;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CadastroFornecedorRequest $request)
    {
        $fornecedor = Fornecedor::create($request->all());
        return response()->json(['message' => 'Fornecedor cadastrado com sucesso.'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}