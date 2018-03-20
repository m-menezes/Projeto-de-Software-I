<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use App\User;
use App\Organizacao;
use App\Pessoa;
use Auth;

class RegisterController extends Controller
{
/*
|--------------------------------------------------------------------------
| Register Controller
|--------------------------------------------------------------------------
|
| This controller handles the registration of new users as well as their
| validation and creation. By default this controller uses a trait to
| provide this functionality without requiring any additional code.
|
*/

use RegistersUsers;

/**
* Where to redirect users after registration.
*
* @var string
*/
protected $redirectTo = '/home';

/**
* Create a new controller instance.
*
* @return void
*/
public function __construct()
{
    $this->middleware('guest');
}

/**
* Get a validator for an incoming registration request.
*
* @param  array  $data
* @return \Illuminate\Contracts\Validation\Validator
*/
protected function validator(array $data)
{
    return Validator::make($data, [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users|unique:organizacaos',
        'password' => 'required|string|min:6|confirmed',
    ]);
}

/**
* Create a new user instance after a valid registration.
*
* @param  array  $data
* @return \App\User
*/
protected function create(array $data)
{
    return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => bcrypt($data['password']),
        'idroles' => $data['idroles'],
    ]);
}

public function register_user(Request $request){
    return view('cadastro-usuario');
}

public function create_user(Request $request){
    $input = [
        'userName'  => $request['nome'],
        'email'     => $request['email'],
        'password'  => $request['password'],
        'repassword'=> $request['repassword']
    ];
    $rules = [
        'userName'  => 'required|min:5',
        'email'     => 'required|email|unique:users|unique:organizacaos',
        'password'  => 'required|alphaNum|min:5',
        'repassword'=> 'required|same:password'
    ];
    $messages = [
        'unique'    => 'Email já cadastrado',
        'required'  => 'Campo obrigatório',
        'min'       => 'Caracteres insuficientes',
        'same'      => 'Senhas não equivalem',
    ];

    $validator = Validator::make($input, $rules, $messages);
    if($validator->fails())
        return redirect()->back()->withInput()->withErrors($validator->messages());
    $pessoa = Pessoa::create([
        'name'      => $request['nome'],
        'telefone'  => $request['telefone'],
        'endereco'  => $request['endereco'],
    ]);
    $user = [
        'email'=> $request['email'],
        'password'=> \Hash::make( $request['password']),
        'roles'=> 1,
        'idroles' => $pessoa->id,
    ];
    User::create($user);

    return redirect()->route('home');
}


public function register_org(Request $request){
    return view('cadastro-organizacao');
}
public function create_org(Request $request){
    $input = [
        'name'     => $request['name'],
        'cnpj'      => $request['cnpj'],
        'email'     => $request['email'],
        'password'  => $request['password'],
        'repassword'=> $request['repassword']
    ];
    $rules = [
        'name'     => 'required|min:5',
        'cnpj'      => 'required|min:14',
        'email'     => 'required|email|unique:users|unique:organizacaos',
        'password'  => 'required|alphaNum|min:5',
        'repassword'=> 'required|same:password'
    ];
    $messages = [
        'unique'    => 'Email já cadastrado',
        'required'  => 'Campo obrigatório',
        'min'       => 'Caracteres insuficientes',
        'same'      => 'Senhas não equivalem',
    ];
    $validator = Validator::make($input, $rules, $messages);
    if($validator->fails())
        return redirect()->back()->withInput()->withErrors($validator->messages());
    $org = Organizacao::create([
        'name'      => $request['name'],
        'telefone'  => $request['telefone'],
        'cnpj'      => $request['cnpj'],
        'endereco'  => $request['endereco'],
    ]);
    $user = [
        'email'=> $request['email'],
        'password'=> \Hash::make( $request['password']),
        'roles'=> 2,
        'idroles' => $org->id,
    ];
    User::create($user);
    return redirect()->route('home');
}
}
