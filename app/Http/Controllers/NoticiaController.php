<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Noticia;
use App\Pessoa;
use Auth;

class NoticiaController extends Controller{
	

	public function noticias(){
		try {
			if ( DB::connection('sqlite')->table('noticias')->orderBy('created_at', 'DESC')->get()->count() === 0 ){
				throw new \Exception('erro');
			} else {
				$registros = DB::connection('sqlite')->table('noticias')->orderBy('created_at', 'DESC')->get();
			}
		} catch (\Exception $e) {
			$registros = DB::connection('sqlite2')->table('noticias')->orderBy('created_at', 'DESC')->get();
		}
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
		$database = ['sqlite', 'sqlite2'];
		foreach ($database as $db) {
			try{ DB::connection($db)->table('noticias')->insert($dados); }  catch (\Exception $e) { };
		}
		return redirect()->route('noticias');
	}

	public function deletar_noticia($id){
		$database = ['sqlite', 'sqlite2'];
		foreach ($database as $db) {
			try{
				$destroy = DB::connection($db)->table('noticias')->find($id);
				if($destroy->imagem_path){
					$arquivo = (array_reverse(explode('/', $destroy->imagem_path)))[0];
					unlink(config('app.noticias_storage_save').'/'.$arquivo);
				}
				DB::connection($db)->table('noticias')->delete($id);
			}
			catch (\Exception $e) { };
		}
		return redirect()->route('noticias');
	}
	
	public function editar_noticia($id){
		try {
			if ( !DB::connection('sqlite')->table('noticias')->find($id) ){
				throw new \Exception('erro');
			} else {
				$registro = DB::connection('sqlite')->table('noticias')->find($id);
			}
		} catch (\Exception $e) {
			$registro = DB::connection('sqlite2')->table('noticias')->find($id);
		}
		return view('dashboard.editar', compact(['registro']));
	}


	public function update_noticia(Request $req, $id){
		$novo =	$req->all();
		$database = ['sqlite', 'sqlite2'];
		try {
			if ( !DB::connection('sqlite')->table('noticias')->find($id) ){
				throw new \Exception('erro');
			} else {
				$antigo = DB::connection('sqlite')->table('noticias')->find($id);
			}
		} catch (\Exception $e) {
			$antigo = DB::connection('sqlite2')->table('noticias')->find($id);
		}
		$antigo->titulo = $novo['titulo'];
		$antigo->descricao = $novo['descricao'];
		if( $req->file('imagem')){
			$file = $req->file('imagem');
			$antigo->imagem_name = time(). '.' .$file->getClientOriginalExtension();
			$file->move(config('app.noticias_storage_save'), $antigo->imagem_name);
			if($antigo->imagem_path){
				$arquivo = (array_reverse(explode('/', $antigo->imagem_path)))[0];
				unlink(config('app.noticias_storage_save').'/'.$arquivo);
			}
			$antigo->imagem_path = config('app.noticias_storage').'/'.$antigo->imagem_name;
		}
		foreach ($database as $db) {
			try {
				DB::connection($db)->update('update noticias set titulo = "'.$antigo->titulo.'", descricao = "'.$antigo->descricao.'", imagem_name = "'.$antigo->imagem_name.'", imagem_path = "'.$antigo->imagem_path.'"  where id = '.$id);
			} catch (\Exception $e) {}
		}
		return redirect()->route('noticias');
	}

}
