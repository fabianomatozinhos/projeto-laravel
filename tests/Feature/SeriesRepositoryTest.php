<?php

namespace Tests\Feature;

use App\Repositorios\EloquentSeriesRepositorio;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SeriesRepositoryTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_quando_uma_serie_e_criada_suas_temporadas_e_episodios_tambem_devem_ser_criados()
    {
        //arrange - prepara o ambiente de teste
        $respository = $this->app->make(EloquentSeriesRepositorio::class);
        $request = new EloquentSeriesRepositorio();
        $request->nome = 'Nome da série';
        $request->numero_temporada = 33;
        $request->eps_temporada = 9;

        
        //act executa o ambiente
        $respository->add($request);

        //assert verifica o resultado esperado
        $this->assertDatabaseHas('series', ['nome' => 'Nome da série']);
        $this->assertDatabaseHas('temporadas', ['numero' => 33]);
        $this->assertDatabaseHas('episodios', ['numero' => 9 ]);

    }
}
