<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantidade',
        'status',
        'usuario_id',
        'data',
    ];

    // Relacionamento: Pedido pertence a um comprador (usuário)
    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    // Relacionamento: Pedido tem muitos produtos (pivot)
    public function produtos()
    {
        return $this->belongsToMany(Produto::class, 'pedido_produto')
            ->using(PedidoProduto::class) // Indica o uso do modelo pivot
            ->withPivot('quantidade') // Inclui o campo "quantidade" no relacionamento
            ->withTimestamps();
    }
}
