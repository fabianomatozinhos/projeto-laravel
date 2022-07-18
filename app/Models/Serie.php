<?php

namespace App\Models;

use Illuminate\Database\Eloquente\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    use HasFactory;
    protected $table = 'series';
    protected $primaryKey = 'id';

    protected $fillable = ['nome'];

    protected $with = ['temporada'];


    public function temporada()
    {
        return $this->hasMany(Temporada::class, 'series_id');
    }

    // public static function booted()
    // {
    //     self::addGlobalScope('ordernacao', function (Builder $queryBuilder) 
    //     {
    //         $queryBuilder->orderBy('nome');
    //     });
    // }
}
