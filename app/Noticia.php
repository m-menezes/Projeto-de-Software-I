<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    protected $connection = 'sqlite2';

    protected $fillable = [
        'titulo',
        'descricao',
        'imagem_name',
        'imagem_path',
        'idpessoa',
    ];
    public function idpessoa(){
        return $this->hasOne('App\Pessoa');
    }
}
