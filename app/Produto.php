<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = [
        'produto',
        'tipo',
        'descricao',
        'cep',
        'endereco',
        'numero',
        'bairro',
        'complemento',
        'idpessoa',
    ];
    public function idpessoa(){
        return $this->hasOne('App\Pessoa');
    }
}
