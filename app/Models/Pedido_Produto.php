<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido_Produto extends Model
{
    protected $table = 'pedido_produtos';

    protected $fillable = [
        'produto_id',
        'pedido_id',
        'quantidade',
    ];
}
