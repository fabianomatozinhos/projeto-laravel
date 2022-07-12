<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeriesController extends Controller
{
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
        return view('series.index')
                ->with('series' , $series);
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

    public function store(Request $request)
    {
        $nomeSerie = $request->input('nome');
        #DB::insert('INSERT INTO series (nome) VALUES (?)', [$nomeSerie]);
        $serie = new Serie();
        $serie->nome =  $nomeSerie;
        $serie->save();
        return redirect('/series');
    }
}
