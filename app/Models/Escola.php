<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Escola extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'sigla',
        'endereco',
        'telefone',
        'email',
        'foto',
    ];

    // Relacionamento: Escola tem muitos usuários
    public function usuarios()
    {
        return $this->hasMany(Usuario::class);
    }
}
