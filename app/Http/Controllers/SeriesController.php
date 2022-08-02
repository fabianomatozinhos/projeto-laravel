<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;
use App\Repositorios\EloquentSeriesRepositorio;
use App\Repositorios\SeriesRepositorioInterface;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Support\Facades\Auth;

class SeriesController extends Controller
{

    public function __construct(private SeriesRepositorioInterface $repositorio)
    {
        $this->middleware(Authenticate::class)->except('index');
        
    }

    public function index(Request $request)
    {
        //return redirect('https://www.google.com');
        // $series = [
        //     'Punisher',
        //     'Halo',
        //     'Grey\'s Anatomy'
        // ];

        #$series = DB::select('SELECT nome FROM series;');

        //$series = Serie::all();
        $series = Serie::query()->orderBy('nome',  'desc')->get();

        //ou
        // return view('listar-series', [
        //     'series' => $series
        // ]);

        //ou
        //return view('listar-series', compact('series'));

        //ou
        $mensagemSucesso = $request->session()->get('mensagem.sucesso');
        //$request->session()->forget('mensagem.sucesso');
        return view('series.index')
                ->with('series' , $series)
                ->with('mensagemSucesso', $mensagemSucesso);
    }

    public function create()
    {
        //return redirect('https://www.google.com');
        // $series = [
        //     'Punisher',
        //     'Halo',
        //     'Grey\'s Anatomy'
        // ];

        //ou
        // return view('listar-series', [
        //     'series' => $series
        // ]);

        //ou
        //return view('listar-series', compact('series'));

        //ou
        return view('series.create');
    }

    // public function store(Request $request)
    // {
    //     //dd($request->all());
    //     $nomeSerie = $request->input('nome');
    //     //ou
    //     $nomeSerie = $request->nome;
    //     #DB::insert('INSERT INTO series (nome) VALUES (?)', [$nomeSerie]);
        
    //     //opcao 1 criar um objeto e inserir
    //     //$serie = new Serie();
    //     //$serie->nome =  $nomeSerie;
    //     //$serie->save();

    //     //opcao 2 criar
    //     $serie = Serie::create($request->all());
    //     //Serie::create($request->only(['nome']));
    //     //Serie::create($request->except(['_toke']));
    //     $request->session()->flash('mensagem.sucesso',"Série '{$serie->nome}' criada com sucesso ");
    //     return to_route('series.index');
    //     //return redirect('/series');
    // }

    public function store(Request $request, EloquentSeriesRepositorio $repositorio)
    {
        $serie = $repositorio->add($request);

        return to_route('series.index')
            ->with('mensagem.sucesso',"Série '{$serie->nome}' criada com sucesso ");
    }

    // public function destroy(Request $request)
    // {
    //     $serie = Serie::find($request->id);
    //     Serie::destroy($request->id);
    //     //$request->session()->put('mensagem.sucesso', 'Série removida com sucesso');
    //     $request->session()->flash('mensagem.sucesso', "Série {$serie->nome} removida com sucesso");
    //     return to_route('series.index');
    // }

    // public function destroy(Serie $serie, Request $request)
    // {
    //     $serie->delete();
    //     $request->session()->flash('mensagem.sucesso', "Série {$serie->nome} removida com sucesso");
    //     return to_route('series.index');
    // }

    public function destroy(Serie $serie, Request $request)
    {
        $serie->delete();
        return to_route('series.index')
            ->with('mensagem.sucesso', "Série {$serie->nome} removida com sucesso");
    }

    public function edit(Serie $serie)
    {
        //dd($serie->temporada());
        return view('series.edit')
            ->with('serie', $serie);
    }

    public function update(Serie $serie, Request $request)
    {
        //$serie->nome = $request->nome;
        $serie->fill($request->all());
        $serie->save();

        return  to_route('series.index')
        ->with('mensagem.sucesso', "Série {$serie->nome} atualizada com sucesso");
    }
}