<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/** SUPERADMIN **/
Route::group(['middleware' => 'auth', 'middleware' => 'superadmin'], function(){
	/*NOTICIAS*/
	Route::get('/noticias/adicionar', 			['as' => 'adicionar_noticia', 	'uses' => 'NoticiaController@adicionar_noticia']);
	Route::get('/noticias/deletar/{id}',		['as' => 'deletar_noticia', 	'uses' => 'NoticiaController@deletar_noticia']);
	Route::get('/noticias/editar/{id}', 		['as' => 'editar_noticia', 		'uses' => 'NoticiaController@editar_noticia']);
	Route::post('/noticias/update/{id}', 		['as' => 'update_noticia', 		'uses' => 'NoticiaController@update_noticia']);
	Route::post('/noticias/adicionar/save', 	['as' => 'save_noticia', 		'uses' => 'NoticiaController@save_noticia']);
	/*LISTA DE USUARIOS*/
	Route::get('/usuarios', 					['as' => 'lista_users',			'uses' => 'SmartRecycleController@lista_users']);

});
/** SUPERADMIN **/
/** ADMIN **/
Route::group(['middleware' => 'auth'], function(){
	Route::get('/produto', 						['as' => 'produto', 			'uses' => 'SmartRecycleController@produto']);
	Route::get('/produto/adicionar', 			['as' => 'adicionar_produto', 	'uses' => 'SmartRecycleController@adicionar_produto']);
	Route::post('/produto/adicionar', 			['as' => 'create_produto', 		'uses' => 'SmartRecycleController@create_produto']);
	Route::get('/produto/deletar/{id}', 		['as' => 'delete_produto', 		'uses' => 'SmartRecycleController@delete_produto']);
	Route::get('/produto/editar/{id}', 			['as' => 'editar_produto', 		'uses' => 'SmartRecycleController@editar_produto']);
	Route::post('/produto/update/{id}', 		['as' => 'update_produto', 		'uses' => 'SmartRecycleController@update_produto']);
	Route::get('/produto/status',	 			['as' => 'status_produto', 		'uses' => 'SmartRecycleController@status_produto']);
});





/** GUEST **/
Route::get('/documentacao', 					function () {return view('documentacao');});
Route::get('/noticias', 						['as' 	=> 'noticias', 			'uses' => 'NoticiaController@noticias']);
Route::get('/', 								['as' 	=> 'home',				'uses' => 'SmartRecycleController@index']);
Route::get('/login',							['as'    => 'login', 			'uses' => 'Auth\LoginController@login']);
Route::post('/login',							['as'    => 'doLogin',			'uses' => 'Auth\LoginController@doLogin']);
Route::get('/logout', 							['as'    => 'logout',			'uses' => 'Auth\LoginController@logout']);
Route::get('/cadastro/usuario', 				['as'    => 'register_user',	'uses' => 'Auth\RegisterController@register_user']);
Route::post('/cadastro/usuario', 				['as'    => 'create_user', 		'uses' => 'Auth\RegisterController@create_user']);
Route::get('/cadastro/organizacao', 			['as'    => 'register_org',		'uses' => 'Auth\RegisterController@register_org']);
Route::post('/cadastro/organizacao', 			['as'    => 'create_org',		'uses' => 'Auth\RegisterController@create_org']);
/** GUEST **/	