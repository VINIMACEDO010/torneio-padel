<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Torneio extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'data_inicio', 'data_fim'];

    public function partidas()
    {
        return $this->hasMany(Partida::class);
    }
}
