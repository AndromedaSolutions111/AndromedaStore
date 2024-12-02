<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'descricao',
        'preco',
        'quantidade',
        'aprovado',
        'foto',
        'usuario_id',
    ];

    // Relacionamento: Produto pertence a um vendedor (usuário)
    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    // Relacionamento: Produto pertence a muitos pedidos (pivot)
    public function pedidos()
    {
        return $this->belongsToMany(Pedido::class, 'pedido_produto')
            ->using(PedidoProduto::class) // Indica o uso do modelo pivot
            ->withPivot('quantidade') // Inclui o campo "quantidade" no relacionamento
            ->withTimestamps();
    }

}
