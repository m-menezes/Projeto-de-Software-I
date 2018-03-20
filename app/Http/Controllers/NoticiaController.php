<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use App\Noticia;
use App\Pessoa;
use Auth;

class NoticiaController extends Controller{
	

	public function noticias(){
		$registros = Noticia::join('pessoas', 'noticias.idpessoa', '=', 'pessoas.id')->select('noticias.*', 'pessoas.name')->orderBy('created_at', 'DESC')->get();
		return view('noticias', compact( ['registros'] ));
	}

	public function adicionar_noticia(){
		return view('dashboard.adicionar');
	}

	public function save_noticia(Request $req){
		$request = $req->all();
		$dados['titulo'] = $request['titulo'];
		$dados['descricao'] = $request['descricao'];
		$dados['idpessoa'] =  Auth::user()->id;
		if($req->file('imagem')){
			$file = $req->file('imagem');
			$dados['imagem_name'] = time(). '.' .$file->getClientOriginalExtension();
			$dados['imagem_path'] = config('app.noticias_storage').'/'.$dados['imagem_name'];
			$file->move(config('app.noticias_storage_save'), $dados['imagem_name']);
		}
		Noticia::create($dados);
		return redirect()->route('noticias');
	}

	public function deletar_noticia($id){
		$destroy = Noticia::find($id);
		if($destroy['imagem_path']){
			$arquivo = (array_reverse(explode('/', $destroy['imagem_path'])))[0];
			unlink(config('app.noticias_storage_save').'/'.$arquivo);
		}
		$destroy->delete();
		return redirect()->route('noticias');
	}
	
	public function editar_noticia($id){
		$registro = Noticia::find($id);
		return view('dashboard.editar', compact(['registro']));
	}

	public function update_noticia(Request $req, $id){
		$novo =	$req->all();	
		$antigo = Noticia::find($id);
		$antigo['titulo'] = $novo['titulo'];
		$antigo['descricao'] = $novo['descricao'];
		$dados['idpessoa'] =  $antigo['idpessoa'];
		if($req->file('imagem')){
			$file = $req->file('imagem');
			$antigo['imagem_name'] = time(). '.' .$file->getClientOriginalExtension();
			$file->move(config('app.noticias_storage_save'), $antigo['imagem_name']);
			if($antigo['imagem_path']){
				$arquivo = (array_reverse(explode('/', $antigo['imagem_path'])))[0];
				unlink(config('app.noticias_storage_save').'/'.$arquivo);
			}
			$antigo['imagem_path'] = config('app.noticias_storage').'/'.$antigo['imagem_name'];
		}
		$antigo->update();
		return redirect()->route('noticias');
	}
}
