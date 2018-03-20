<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Noticia;
use App\User;
use App\Organizacao;
use App\Produto;
use App\Pessoa;
Use Auth;


class SmartcycleController extends Controller{
	public function index(){
		$noticias = Noticia::orderBy('created_at', 'DESC')->get();
		return view('index', compact( ['noticias'] ));
	}
	public function lista_users(){
		$organizacoes = User::join('organizacaos', 'users.idroles', '=', 'organizacaos.id')->where('roles', '=', '2')->orderBy('created_at', 'DESC')->get();
		$usuarios = User::join('pessoas', 'users.idroles', '=', 'pessoas.id')->where('roles', '<', '2')->orderBy('created_at', 'DESC')->get();
		return view('dashboard.usuarios', compact( ['usuarios', 'organizacoes'] ));
	}
	public function produto(){
		if(Auth::user()->roles == 0){
			// VERIFICAR QUERY
			$registros =  Produto::	join('pessoas', 'produtos.idpessoa', '=', 'pessoas.id')
			->join('users', 'produtos.idpessoa', '=', 'users.idroles')
			->where('users.roles', '<', 2)
			->select('produtos.*', 'pessoas.name', 'users.email')
			->orderBy('created_at', 'DESC')
			->get();
			return view('dashboard.produto', compact( ['registros'] ));
		}
		else{
			$registros = Produto::where('idpessoa', '=', Auth::user()->id )->orderBy('created_at', 'DESC')->get();
			$registros = Produto::join('pessoas', 'produtos.idpessoa', '=', 'pessoas.id')
			->join('users', 'produtos.idpessoa', '=', 'users.idroles')
			->where('idpessoa', '=', Auth::user()->idroles, 'AND', 'users.roles', '<', 2 )
			->select('produtos.*', 'pessoas.name', 'users.email')
			->orderBy('created_at', 'DESC')
			->get();
			return view('dashboard.produto', compact( ['registros'] ));
		}
	}
	public function adicionar_produto(){
		return view('dashboard.produto-adicionar');
	}

	public function create_produto(Request $req){
		$request = $req->all();
		$rules = [
			'produto'  	=> 'required',
			'cep'  		=> 'required',
			'endereco'  => 'required',
			'numero'  	=> 'required',
			'bairro'  	=> 'required',
		];
		$messages = [
			'required'  => 'Campo obrigatório',
		];
		$validator = Validator::make($request, $rules, $messages);
		if($validator->fails()){
			return redirect()->back()->withInput()->withErrors($validator->messages());

		}
		else{

			$request['idpessoa'] = Auth::user()->idroles;
			Produto::create($request);
			return redirect()->route('produto');
		}
	}
	public function delete_produto($id){
		$destroy = Produto::find($id);
		$query = Pessoa::join('produtos', 'produtos.idpessoa', '=', 'pessoas.id')
					->where('produtos.id', '=', $id)
					->select('pessoas.id')
					->get();
		$pessoa = collect($query->toArray())->all()[0];
		if(Auth::user()->roles == 0 || $pessoa['id'] == $destroy->idpessoa){
			$destroy->delete();
		}
		return redirect()->route('produto');
	}
}
