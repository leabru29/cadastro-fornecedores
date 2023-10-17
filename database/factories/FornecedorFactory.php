<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Fornecedor>
 */
class FornecedorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "nome" => fake()->company(),
            "razao_social" => fake()->companyEmail(),
            "tipo_pessoa" => rand(1, 2),
            "dt_nasc" => fake()->date('Y-m-d', now()),
            "rg" => rand(11, 99) ."." . rand(111, 999) ."." . rand(111, 999) ."-" . rand(1, 9),
            "insc_est" => rand(11111, 99999),
            "nome_res" => fake()->name(),
            "tel_res" => "(". rand(11, 98) .") " . rand(1111, 9999) ."-" . rand(1111, 9999),
            "logradouro" => fake()->streetAddress(),
            "numero" => rand(1111, 9999),
            "complemento" => fake()->streetSuffix(),
            "bairro" => fake()->address(),
            "cidade" => fake()->city(),
            "cep" => rand(11111, 99999) . "-" . rand(111, 999),
            "tel_2" => "(". rand(11, 98) .") " . 9 . rand(1111, 9999) ."-" . rand(1111, 9999),
            "tel_1" => "(". rand(11, 98) .") " . 9 . rand(1111, 9999) ."-" . rand(1111, 9999),
            "email" => fake()->email(),
            "site" => fake()->companyEmail(),
            "observacoes" => fake()->text()
        ];
    }
}