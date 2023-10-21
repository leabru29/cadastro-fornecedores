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
     * Método responsável por cadastrar um novo fornecedor.
     */
    public function store(CadastroFornecedorRequest $request)
    {
        $fornecedor = Fornecedor::create($request->all());
        return response()->json(['message' => 'Fornecedor cadastrado com sucesso.'], 201);
    }

    /**
     * Método responsável por mostrar um Fornecedor.
     */
    public function show(string $id)
    {
        $fornecedor = Fornecedor::findOrFail($id);
        return $fornecedor;
    }

    /**
     * Método responsável por atualizar um Fornecedor.
     * Este método usa o método Show nessa mesma classe para encontrar o Fornecedor
     */
    public function update(CadastroFornecedorRequest $request, string $id)
    {
        $fornecedor = $this->show($id);
        $fornecedor->update($request->all());
        return response()->json(['message' => 'Forncedor atualizado com sucesso.']);
    }

    /**
     * Método responsável por deletar um Fornecedor, porém o fornecedor não é deletado no banco de acordo 
     * com a Model, poís é usado o SoftDelete.
     */
    public function destroy(string $id)
    {
        $fornecedor = $this->show($id);
        $fornecedor->destroy();
        return response()->json(['message' => 'Fornecedor deletado com sucesso.']);
    }
}