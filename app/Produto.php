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
        'idchat',
        'imagem_name',
        'imagem_path',
    ];
    public function idpessoa(){
        return $this->hasOne('App\Pessoa');
    }
    public function idorganizacao(){
        return $this->hasOne('App\Organizacao');
    }
    public function idchat(){
        return $this->hasOne('App\Chat');
    }
}
