<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jogador extends Model
{
    use HasFactory;

    protected $fillable = ['nome'];

    public function partidasComoJogador1()
    {
        return $this->hasMany(Partida::class, 'jogador1_id');
    }

    public function partidasComoJogador2()
    {
        return $this->hasMany(Partida::class, 'jogador2_id');
    }

    public function partidas()
    {
        return $this->partidasComoJogador1->merge($this->partidasComoJogador2);
    }
}
