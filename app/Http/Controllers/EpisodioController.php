<?php 

namespace App\Http\Controllers;

use App\Models\Serie;
use App\Models\Temporada;

class EpisodioController
{
    public function index(Temporada $temporada )
    {
        return view('episodio.index', ['episodios' => $temporada->episodio]);
    }
}