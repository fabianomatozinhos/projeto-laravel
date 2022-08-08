<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Temporada;

class Serie extends Model
{
    use HasFactory;
    //protected $table = 'series';
    //protected $primaryKey = 'id';
    //protected $with = ['temporadas'];

    protected $fillable = ['nome', 'capa_path'];
    protected $appends = ['links'];

    public function temporada()
    {
        return $this->hasMany(Temporada::class, 'series_id');
    }

    public function episodio()
    {
        //eu tenho muitos episodios atraves das temporadas
        return $this->hasManyThrough(Episodio::class, Temporada::class);
    }

    public static function booted()
    {
        self::addGlobalScope('ordernacao', function (Builder $queryBuilder) 
        {
            $queryBuilder->orderBy('nome');
        });
    }

    
    public function links():Attribute
    {
        return new Attribute(
            get: fn () => [
                [
                    'rel' => 'self',
                    'url' =>  "/api/series/{$this->id}"
                ],
                [
                    'rel' => 'temporadas',
                    'url' =>  "/api/series/{$this->id}/temporadas"
                ],
                [
                    'rel' => 'episodios',
                    'url' =>  "/api/series/{$this->id}/episodios"
                ],
            ],
        );
    }
}
