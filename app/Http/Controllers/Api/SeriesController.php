<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Serie;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index()
    {
        return Serie::all();
    }

    public function store(Request $request)
    {
        // $serie = new Serie();
        // $serie->nome = $request->nome;        
        // return $serie->save();
        return response()
            ->json(Serie::create($request->all()), 201);
    }

    public function show(Serie $serie)
    {
        return response()
            ->json($serie, 200);
    }

    public function update(Serie $serie, Request $request)
    {
        $serie->nome = $request->nome;
        $serie->save();
        return response($serie, 200);
    }

    public function destroy(int $serie)
    {
        Serie::destroy($serie);
        return response()->noContent();
    }
}