<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Campos que podem ser preenchidos em massa.
     *
     * @var array
     */
    protected $fillable = [
        'nome',
        'email',
        'senha',
        'telefone',
        'tipo',
        'classe',
        'turma',
        'sala',
        'foto',
        'periodo',
        'escola_id',
    ];

    /**
     * Relacionamento: Um usuário pertence a uma escola.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function escola()
    {
        return $this->belongsTo(Escola::class);
    }

    /**
     * Relacionamento: Um usuário pode vender muitos produtos.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function produtos()
    {
        return $this->hasMany(Produto::class);
    }

    /**
     * Relacionamento: Um usuário pode ter muitos pedidos (como comprador).
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pedidos()
    {
        return $this->hasMany(Pedido::class);
    }

    /**
     * Define o nome do campo de senha.
     *
     * @var string
     */
    protected $hidden = [
        'senha',
    ];

    /**
     * Define que o campo senha deve ser chamado de 'senha' no banco de dados.
     *
     * @return void
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['senha'] = bcrypt($value);
    }
}
