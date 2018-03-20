<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Pessoa;
use App\Organizacao;

class Users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        $pessoa = Pessoa::create(['name' => 'Admin']);
        $user = [
            'email'=>"user@admin",
            'password'=>bcrypt("admin"),
            'roles'=>"0",
            'idroles' => $pessoa->id,
        ];
        if(User::where('email','=',$user['email'])->count()){
            $usuario = User::where('email','=',$user['email'])->first();
            $usuario->update($user);
        }else{
            User::create($user);
        }

        $org = Organizacao::create([
            'name' => 'SmartRecycle',
            'cnpj' => '12345678901234',
        ]);
        $org = [
            'email'=>"org@admin",
            'password'=>bcrypt("admin"),
            'roles'=>"2",
            'idroles' => $pessoa->id,
        ];
        if(User::where('email','=',$org['email'])->count()){
            $usuario = User::where('email','=',$org['email'])->first();
            $usuario->update($org);
        }else{
            User::create($org);
        }
    }
}
