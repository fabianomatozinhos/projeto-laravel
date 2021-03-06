<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Temporada extends Model
{
    use HasFactory;

    protected $fillable = ['numero'];

    public function serie()
    {
        $this->belongsTo(Serie::class);
    }

    public function episodio()
    {
        return $this->hasMany(Episodio::class);
    }
}
