<?php

use Illuminate\Database\Seeder;
use App\Chat;


class Chats extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        Chat::create();
        Chat::create();
    }
}
