<?php

namespace App\Listeners;

use App\Events\EventoSerieCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

// implements ShouldQueue -> coloca o evento para ser executado na fila de jobs para ser executado de forma assincrona

class LogCriacaoSerie implements ShouldQueue
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
     * @param  \App\Events\EventoSerieCreated  $event
     * @return void
     */
    public function handle(EventoSerieCreated $event)
    {
        Log::info("Serie {$event->serieNome} criada com sucesso");
    }
}
