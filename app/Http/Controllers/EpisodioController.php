<?php 

namespace App\Http\Controllers;

use App\Models\Episodio;
use App\Models\Serie;
use App\Models\Temporada;
use Illuminate\Http\Request;

class EpisodioController
{
    public function index(Temporada $temporada )
    {
        return view('episodio.index', [
            'episodios' => $temporada->episodio,
            'mensagemSucesso' => session('mesagem.sucesso')
        ]);
    }

    public function update(Request $request, Temporada $temporada)
    {
        $episodiosAssistidos = $request->episodios;
        
        $temporada->episodio->each(function (Episodio $episodio) use ($episodiosAssistidos) {
            $episodio->assistido = in_array($episodio->id, $episodiosAssistidos);
        });
        $temporada->push();

        return to_route('episodio.index', $temporada->id)
            ->with('mensagem.sucesso', 'Episódio marcados como assistidos');
    }
}