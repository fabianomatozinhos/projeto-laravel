<?php

namespace App\Repositorios;

use Illuminate\Http\Request;
use App\Models\Serie;

interface SeriesRepositorioInterface
{
    public function add(Request $request): Serie;
}