<?php

namespace App\Listeners;

use App\Events\EventoSerieCreated;
use App\Mail\SeriesCreated;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

// implements ShouldQueue -> coloca o evento para ser executado na fila de jobs para ser executado de forma assincrona

class EmailUsuarioSobreCriacaoSerie implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(EventoSerieCreated $event)
    {
      
        $listaUsuarios = User::all();

        foreach ($listaUsuarios as $key => $usuario) {
            $email = new SeriesCreated(
                $event->serieNome,
                $event->serieId,
                $event->serieNumeroTemporada,
                $event->serieEpsTemporada
            );

            //adicioando tempo entre cada envio
            // $tempo = new DateTime();
            // $tempo->modify($key * 2 . ' seconds');
            // Mail::to($usuario)->later($tempo, $email);
            //ou 
            $tempo = now()->addSeconds($key * 5);
            Mail::to($usuario)->later($tempo, $email);

            //queue envia para a fila
            //Mail::to($usuario)->queue($email);
            
            //envia o email
            //Mail::to($usuario)->send($email);
            //sleep(2);
        }
        
        //Mail::to(Auth::user())->send($email);
    }
}
