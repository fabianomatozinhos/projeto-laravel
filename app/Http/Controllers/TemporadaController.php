<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;

class TemporadaController extends Controller
{
    public function index(Serie $serie)
    {
        $temporadas = $serie->temporada()->with('episodio')->get();

        return view('temporada.index')
            ->with('temporadas', $temporadas)
            ->with('series', $serie);
    }
}
