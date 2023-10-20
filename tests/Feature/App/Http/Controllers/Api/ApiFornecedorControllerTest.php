<?php

namespace Tests\Feature\App\Http\Controllers\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ApiFornecedorControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_if_return_all_fornecedores(): void
    {
        $response = $this->get('/api/fornecedores');

        $response->assertStatus(200);
    }
}