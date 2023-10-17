<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CadastroFornecedorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "nome" => ['required'],
            "razao_social" => ['required'],
            "tipo_pessoa" => ['required'],
            "logradouro" => ['required'],
            "numero" => ['required'],
            "bairro" => ['required'],
            "cidade" => ['required'],
            "cep" => ['required', 'max:9', 'min:8'],
            "tel_1" => ['required'],
            "email" => ['required']
        ];
    }

    public function messages(): array
    { 
        return [
            "nome.required" => 'O campo nome é obrigatório.',
            "razao_social.required" => 'O campo Razão Social é obrigatório.',
            "tipo_pessoa.required" => 'Escolha o Tipo de Pessoa.',
            "logradouro.required" => 'O campo Endereço é obrigatório.',
            "numero.required" => 'O campo Número é obrigatório.',
            "bairro.required" => 'O campo Bairro é obrigatório.',
            "cidade.required" => 'O campo Cidade é obrigatório.',

            "cep.required" => 'O campo CEP é obrigatório.',
            "cep.min" => 'Por favor insira um CEP válido.',
            "cep.max" => 'Por favor insira um CEP válido.',

            "tel_1.required" => 'O campo Telefone 1 é obrigatório.',
            "email.required" => 'O campo E-mail é obrigatório.',
        ]; 
    }
}