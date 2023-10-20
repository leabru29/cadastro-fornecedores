<?php

namespace Tests\Feature\App\Http\Controllers\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ApiFornecedorControllerTest extends TestCase
{
    /**
     * Testa se retorna todos os fornecedores.
     */
    public function test_if_return_all_fornecedores(): void
    {
        $this->withoutMiddleware();
        
        $response = $this->get('/api/fornecedores');

        $response->assertStatus(200);
    }
}