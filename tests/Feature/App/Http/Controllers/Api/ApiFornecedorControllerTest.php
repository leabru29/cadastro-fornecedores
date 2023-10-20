<?php

namespace Tests\Feature\App\Http\Controllers\Api;

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
}