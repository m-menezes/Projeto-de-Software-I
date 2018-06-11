<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Noticia;
use App\User;
use App\Organizacao;
use App\Produto;
use App\Pessoa;
use App\Chat;
use DateTime;
Use Auth;


class SmartRecycleController extends Controller{
	public function index(){
		$noticias = Noticia::orderBy('created_at', 'DESC')->limit(6)->get();
		$registros = Produto::orderBy('created_at', 'DESC')
		->where('produtos.status', '=', 'Disponivel')
		->limit(5)
		->get();
		return view('index', compact( ['noticias', 'registros'] ));
	}
	public function lista_users(){
		$organizacoes = User::join('organizacaos', 'users.idroles', '=', 'organizacaos.id')
		->where('roles', '=', '2')
		->orderBy('created_at', 'DESC')
		->get();
		$usuarios = User::join('pessoas', 'users.idroles', '=', 'pessoas.id')
		->where('roles', '<', '2')
		->select('pessoas.*', 'users.id as users_id', 'users.roles', 'users.idroles', 'users.email as email')
		->orderBy('created_at', 'DESC')
		->get();
		return view('dashboard.usuarios', compact( ['usuarios', 'organizacoes'] ));
	}
	public function produto(){
		if(Auth::user()->roles == 0 || Auth::user()->roles == 2){
			$registros =  Produto::join('pessoas', 'produtos.idpessoa', '=', 'pessoas.id')
			->leftjoin('organizacaos', 'produtos.idorganizacao', '=', 'organizacaos.id')
			->join('users', 'produtos.idpessoa', '=', 'users.idroles')
			->where('users.roles', '<', 2)
			->select('produtos.*', 'pessoas.name as user_name', 'users.email as user_email', 'organizacaos.name as org_name', 'organizacaos.telefone as org_telefone')
			->orderBy('created_at', 'DESC')
			->get();
			return view('dashboard.produto', compact( ['registros'] ));
		}
		else{
			$registros = Produto::join('pessoas', 'produtos.idpessoa', '=', 'pessoas.id')
			->leftjoin('organizacaos', 'produtos.idorganizacao', '=', 'organizacaos.id')
			->join('users', 'produtos.idpessoa', '=', 'users.idroles')
			->where('idpessoa', '=', Auth::user()->idroles, 'AND', 'users.roles', '<', 2 )
			->select('produtos.*', 'pessoas.name as user_name', 'users.email as user_email', 'organizacaos.name as org_name', 'organizacaos.telefone as org_telefone')
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
			$chat = Chat::create();
			$request['status'] = 'Disponivel';
			$request['idpessoa'] = Auth::user()->idroles;
			$request['idchat'] = $chat->id;
			Produto::create($request);
			return redirect()->route('produto');
		}
	}
	public function editar_produto($id){
		$registro = Produto::find($id);
		return view('dashboard.produto-editar', compact( ['registro']));
	}

	public function update_produto(Request $req, $id){
		$dados = $req->all(); 
		Produto::find($id)->update($dados);
		return redirect()->route('produto');
	}

	public function status_produto($id){
		$dataservidor = new DateTime();
		$produto = Produto::find($id);
		if($produto->status == 'Disponivel'){
			$produto->status = 'Reservado';
			$produto->idorganizacao = Auth::user()->idroles;
			$produto->datareserva = $dataservidor->format('Y-m-d H:i:s');
		}
		else if($produto->status == 'Reservado'){
			$produto->status = 'Disponivel';
			$produto->idorganizacao = NULL;
			$produto->datareserva = NULL;
		}
		$produto->update();
		return redirect()->route('produto');
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


	public function chat_produto($id){
		$chat = Chat::where('id', $id)->get()[0];
		return view('dashboard.produto-chat', compact('chat', 'id'));
	}
	public function chat_update(Request $req, $id){
		$dataservidor = new DateTime();
		$data = $dataservidor->format('d-m-y H:i');

		$request = $req->all();
		$mensagem = array();
		$chat = Chat::find($id);

		if($chat->texto == NULL){
			$array_msg = array("usuario"=>Auth::user()->id, "hora"=>$data, "mensagem"=>$request['message']);
			array_push($mensagem, $array_msg);
			$string_array = json_encode($mensagem);
			$chat->texto = $string_array;
			$chat->save();
		}
		else{
			$mensagem = json_decode($chat->texto, true);
			$array_msg = array("usuario"=>Auth::user()->id, "hora"=>$data, "mensagem"=>$request['message']);
			array_push($mensagem, $array_msg);
			$string_array = json_encode($mensagem);
			$chat->texto = $string_array;
			$chat->save();
		}
		return redirect()->back();
	}








	public function editar_conta($id){
		if(Auth::user()->id != $id){
			return redirect()->back();
		}
		if(Auth::user()->roles < 2){
			$account = User::join('pessoas', 'users.idroles', '=', 'pessoas.id')
			->where('users.id', '=', $id)
			->select('pessoas.*', 'users.id as users_id', 'users.email as email')
			->first();
			return view('dashboard.usuario-editar', compact( ['account']));
		}
		else{
			$account = User::join('organizacaos', 'users.idroles', '=', 'organizacaos.id')
			->where('users.id', '=', $id)
			->select('organizacaos.*', 'users.id as users_id', 'users.email as email')
			->first();
			return view('dashboard.usuario-editar', compact( ['account']));
		}
	}

	public function update_senha(Request $req, $id){
		$request = $req->all(); 
		$input = [
			'email'     => $request['email'],
			'password'  => $request['password'],
			'repassword'=> $request['repassword']
		];
		$rules = [
			'email'     => 'required|email',
			'password'  => 'required|alphaNum|min:5',
			'repassword'=> 'required|same:password'
		];
		$messages = [
			'required'  => 'Campo obrigatório',
			'min'       => 'Caracteres insuficientes',
			'same'      => 'Senhas não equivalem',
		];

		$validator = Validator::make($input, $rules, $messages);
		if($validator->fails())
			return redirect()->back()->withInput()->withErrors($validator->messages());

		$user = Auth::user();
		$user->email = $request['email'];
		$user->password = \Hash::make( $request['password']);
		$user->save();
		return redirect()->back();
	}

	public function update_conta(Request $req, $id){
		$request = $req->all(); 
		if(Auth::user()->id == 2){
			$input = [
				'cnpj'     => $request['cnpj'],
			];
			$rules = [
				'cnpj'  => 'alphaNum|min:10',
			];
			$messages = [
				'min'       => 'CNPJ com caracteres insuficientes',
			];
			$validator = Validator::make($input, $rules, $messages);
			if($validator->fails())
				return redirect()->back()->withInput()->withErrors($validator->messages());

			$user = Organizacao::find($id);
			$user->name = $request['name'];
			$user->cnpj = $request['cnpj'];
			$user->telefone = $request['telefone'];
			$user->endereco = $request['endereco'];
		}
		else{
			$user = Pessoa::find($id);
			$user->name = $request['name'];
			$user->telefone = $request['telefone'];
			$user->endereco = $request['endereco'];
		}
		$user->save();
		return redirect()->back();
	}
	public function roles_users(Request $req){
		$req = $req->all();
		$user = User::find($req['id']);
		$user->roles = $req['value'];
		$user->save();
		return;
	}

	public function delete_conta($id){
		$user = User::find($id);
		if($user->roles == 2){
			$org_destroy = Organizacao::find($user->idroles);
			$user_destroy = User::find($id);
			$org_destroy->delete();
			$user_destroy->delete();
		}
		else{
			$pessoa_destroy = Pessoa::find($user->idroles);
			$user_destroy = User::find($id);
			$pessoa_destroy->delete();
			$user_destroy->delete();
		}
		return redirect()->route('home');
	}
}
