<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Produto;
use DateTime;

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
        $date_atualizada = $date->modify('-1 day');
        $Produtos = Produto::all();
        foreach ($Produtos as $produto) {
            if($produto->datareserva){
                $datareserva = new DateTime($produto->datareserva);
                if($date_atualizada > $datareserva){
                // if(1 == 1){
                    $produto->status = 'Disponivel';
                    $produto->idorganizacao = NULL;
                    $produto->datareserva = NULL;
                    $produto->update();
                    $log = '['. date_format($date, 'd-m-Y H:i') .'] - Reserva alterada - Produto: '.$produto->id.PHP_EOL;
                }
                else{
                    $log = '['. date_format($date, 'd-m-Y H:i') .'] - Reserva não alterada - Produto: '.$produto->id.PHP_EOL;
                }
                echo $log;
            }
        }
    }
}
