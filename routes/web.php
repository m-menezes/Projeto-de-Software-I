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
	Route::get('/usuarios', 					['as' => 'lista_users',			'uses' => 'SmartcycleController@lista_users']);

});
/** SUPERADMIN **/
/** ADMIN **/
Route::group(['middleware' => 'auth'], function(){
	Route::get('/produto', 						['as' => 'produto', 			'uses' => 'SmartcycleController@produto']);
	Route::get('/produto/adicionar', 			['as' => 'adicionar_produto', 	'uses' => 'SmartcycleController@adicionar_produto']);
	Route::post('/produto/adicionar', 			['as' => 'create_produto', 		'uses' => 'SmartcycleController@create_produto']);
	Route::get('/produto/deletar/{id}', 		['as' => 'delete_produto', 		'uses' => 'SmartcycleController@delete_produto']);
});





/** GUEST **/
Route::get('/sobre', 							function () {return view('sobre');});
Route::get('/noticias', 						['as' 	=> 'noticias', 			'uses' => 'NoticiaController@noticias']);
Route::get('/', 								['as' 	=> 'home',				'uses' => 'SmartcycleController@index']);
Route::get('/login',							['as'    => 'login', 			'uses' => 'Auth\LoginController@login']);
Route::post('/login',							['as'    => 'doLogin',			'uses' => 'Auth\LoginController@doLogin']);
Route::get('/logout', 							['as'    => 'logout',			'uses' => 'Auth\LoginController@logout']);
Route::get('/cadastro/usuario', 				['as'    => 'register_user',	'uses' => 'Auth\RegisterController@register_user']);
Route::post('/cadastro/usuario', 				['as'    => 'create_user', 		'uses' => 'Auth\RegisterController@create_user']);
Route::get('/cadastro/organizacao', 			['as'    => 'register_org',		'uses' => 'Auth\RegisterController@register_org']);
Route::post('/cadastro/organizacao', 			['as'    => 'create_org',		'uses' => 'Auth\RegisterController@create_org']);
/** GUEST **/	