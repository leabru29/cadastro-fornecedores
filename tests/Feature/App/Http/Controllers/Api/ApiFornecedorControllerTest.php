<?php

namespace Tests\Feature\App\Http\Controllers\Api;

use App\Models\Fornecedor;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class ApiFornecedorControllerTest extends TestCase
{
    /**
     * Testa se retorna todos os fornecedores.
     */
    public function test_if_return_all_fornecedores(): void
    {
        Sanctum::actingAs(
            User::factory()->create()
        );
        
        $response = $this->get('/api/fornecedores');

        $response->assertStatus(200);
    }

    public function test_add_fornecedor(): void
    {
        Sanctum::actingAs(
            User::factory()->create()
        );

        $data = [
            "nome" => "Teste",
            "razao_social" => "Teste Razão Social",
            "tipo_pessoa" => "PF",
            "dt_nasc" => "2000-01-01",
            "rg" => "11.222.333-4",
            "insc_est" => "123123123",
            "nome_res" => "Teste Nome Residencial",
            "tel_res" => "(11) 1111-2222",
            "logradouro" => "Teste Logradouro",
            "numero" => rand(1111, 9999),
            "complemento" => "Teste complemento",
            "bairro" => "Teste bairro",
            "cidade" => "São Paulo",
            "cep" => "06700-453",
            "tel_2" => "(11) 94323-5434",
            "tel_1" => "(11) 54355-4353",
            "email" => "teste@teste.com",
            "site" => "teste.com",
            "observacoes" => "teste teste teste"
        ];

        $response = $this->post('/api/fornecedores', $data);
        $response->assertStatus(201);
        $response->assertJson(['message' => 'Fornecedor cadastrado com sucesso.']);
    }

    public function test_if_find_fornecedor() : void
    {
        Sanctum::actingAs(
            User::factory()->create()
        );

        $fornecedor = Fornecedor::where('nome', '=', 'Teste')->get()->toArray();

        $response = $this->get('/api/fornecedores/' . $fornecedor[1]['id']);
        $response->assertStatus(200);
    }
}