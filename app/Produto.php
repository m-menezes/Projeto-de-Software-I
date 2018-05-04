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
        'idorganizacao',
        'status',/*Disponivel, Reservado, Concluido*/
        'datareserva',
    ];
    public function idpessoa(){
        return $this->hasOne('App\Pessoa');
    }
    public function idorganizacao(){
        return $this->hasOne('App\Organizacao');
    }
}
