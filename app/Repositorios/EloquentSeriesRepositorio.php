<?php 

// uma classe de repositório que vai lidar com os detalhes do banco de dados, 
//entao toda responsabilidade de tratar detalhes do banco fica nesa classe

namespace App\Repositorios;

use App\Models\Episodio;
use App\Models\Serie;
use App\Models\Temporada;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EloquentSeriesRepositorio implements SeriesRepositorioInterface
{
    // public function __construct(private SeriesRepositorio $repositorio)
    // {
    //     dd('ttt');
    // }

    public function add(Request $request): Serie
    {
        try {
            DB::beginTransaction();
            $request->validate([
                'nome' => 'required|min:3'
            ]);

            //$serie = Serie::create($request->all());
            $serie = Serie::create([
                'nome' => $request->nome,
                'capa_path' => $request->capaPath
            ]);

            for ($i=1; $i <= $request->numero_temporada; $i++) { 
                $temporada[] = [
                    'series_id' => $serie->id,
                    'numero' => $i,
                ];
            }

            Temporada::insert($temporada);

            $episodios = [];
            foreach ($serie->temporada as $key => $temporada) {
                
                for ($j=1; $j <= $request->eps_temporada; $j++) { 
                    $episodios[] = [
                        'temporada_id' => $temporada->id,
                        'numero' => $j
                    ];
                }
            }

            Episodio::insert($episodios);

            DB::commit();
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
        }
        return $serie;
    }
}