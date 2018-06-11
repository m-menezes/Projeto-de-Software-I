<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Produto;

class ReservaCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reserva:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(){
        $date = new DateTime();
        $date->modify('-1 day');
        $Produtos = Produto::all();
        foreach ($Produtos as $produto) {
            if($date > ($produto->datareserva)){
                $produto->status = 'Disponivel';
                $produto->idorganizacao = NULL;
                $produto->datareserva = NULL;
                $produto->update();
            }
        }
    }
}
