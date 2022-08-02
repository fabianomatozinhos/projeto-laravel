<?php

namespace App\Http\Controllers\Api;

use App\Models\Serie;

class TemporadasController
{
    public function show(Serie $serie){
        return $serie->temporada;
    }
}