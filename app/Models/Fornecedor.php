<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fornecedor extends Model
{
    use HasFactory;

    use HasUuids;

    use SoftDeletes;
    

    protected $table = 'fornecedors';

    public $incrementing = false;

    protected $fillable = [
        "nome",
        "razao_social",
        "tipo_pessoa",
        "dt_nasc",
        "rg",
        "insc_est",
        "nome_res",
        "logradouro",
        "numero",
        "complemento",    
        "bairro",
        "cidade",
        "cep",
        "tel_1",
        "tel_2",          
        "email",
        "site",           
        "observacoes"    
    ];

}