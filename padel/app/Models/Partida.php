<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partida extends Model
{
    use HasFactory;

    protected $fillable = [
        'torneio_id',
        'jogador1_id',
        'jogador2_id',
        'sets_jogador1',
        'sets_jogador2'
    ];

    public function torneio()
    {
        return $this->belongsTo(Torneio::class);
    }

    public function jogador1()
    {
        return $this->belongsTo(Jogador::class, 'jogador1_id');
    }

    public function jogador2()
    {
        return $this->belongsTo(Jogador::class, 'jogador2_id');
    }
}
