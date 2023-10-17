<?php

namespace App\Http\Controllers;

use App\Http\Requests\CadastroFornecedorRequest;
use App\Models\Fornecedor;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fornecedores = Fornecedor::all();
        return view('cadastros.fornecedor.index', compact('fornecedores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cadastros.fornecedor.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CadastroFornecedorRequest $request)
    {
        $fornecedor = Fornecedor::create($request->all());
        return redirect()->route('fornecedores.index')->with('message', 'Fornecedor '. $fornecedor->nome .' cadastrado com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $fornecedor = Fornecedor::findOrFail($id);
        return $fornecedor;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $fornecedor = Fornecedor::findOrFail($id);
        return view('cadastros.fornecedor.edit', compact('fornecedor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $fornecedor = Fornecedor::findOrFail($id);
        $fornecedor->update($request->all());
        return redirect()->route('fornecedores.index')->with('message', 'Fornecedor Editado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $fornecedor = Fornecedor::findOrFail($id);
        $fornecedor->delete();
        return response()->json(['message' => 'Fornecedor deletado com sucesso.']);
    }
}