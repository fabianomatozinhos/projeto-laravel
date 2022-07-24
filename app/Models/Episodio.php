<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episodio extends Model
{
    use HasFactory;
    protected $fillable = ['numero'];
    protected $casts = ['assitido' => 'boolean'];

    public function temporada()
    {
        return $this->belongsTo(Temporada::class);
    }


    public function scopeAssistido(Builder $query)
    {
        $query->where('assistido', true);
    }

}
