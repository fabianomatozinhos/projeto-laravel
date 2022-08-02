<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Serie;

class Temporada extends Model
{
    use HasFactory;

    //protected $table = 'temporadas'; 
    protected $primaryKey = 'id';

    protected $fillable = ['numero'];

    public function serie()
    {
        $this->belongsTo(Serie::class);
    }

    public function episodio()
    {
        return $this->hasMany(Episodio::class);
    }

    public function numeroDeEpisodiosAssistido(): int
    {
        return $this->episodio
            ->filter(fn ($episodio) => $episodio->assistido)
            ->count();
    }
}
