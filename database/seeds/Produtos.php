<?php

use Illuminate\Database\Seeder;
use App\Produto;

class Produtos extends Seeder
{
/**
* Run the database seeds.
*
* @return void
*/
public function run(){
	Produto::create([
		'produto' => 'Pedaços de metais',
		'descricao' => 'Possuo varios kg de ferro que preciso retirar do meu pátio, gostaria de doar, só entrar em contato que marcamos um horario para vir pegar. Obrigado',
		'cep' => '97015513',
		'endereco' => 'Presidente Vargas',
		'numero' => '2043',
		'bairro' => 'centro',
		'status' => 'Disponivel',
		'idpessoa' => '1',
		'idchat' => '1',
		'tipo' => 'Metal',
	]);
	Produto::create([
		'produto' => 'Vidro',
		'descricao' => 'Possuo varios latas com vidros, desde garrafas a espelhos e preciso retirar do meu pátio, gostaria de doar, só entrar em contato que marcamos um horario para vir pegar. Obrigado',
		'cep' => '97015513',
		'endereco' => 'Presidente Vargas',
		'numero' => '2043',
		'tipo' => 'Vidro',
		'bairro' => 'centro',
		'status' => 'Disponivel',
		'idpessoa' => '1',
		'idchat' => '2',
	]);
}
}