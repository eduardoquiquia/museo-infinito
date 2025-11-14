<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PedidoDetalle extends Model
{
    use HasFactory;

    /** @var list<string> */
    protected $fillable = [
        'pedido_id',
        'producto_id',
        'cantidad',
        'subtotal'
    ];

    /** @return array<string, */
    protected function casts(): array
    {
        return [
            'pedido_id' => 'integer',
            'producto_id' => 'integer',
            'cantidad' => 'integer',
            'subtotal' => 'decimal:2'
        ];
    }

    public function pedido(): BelongsTo
    {
        return $this->belongsTo(Pedido::class);
    }

    public function producto(): BelongsTo
    {
        return $this->belongsTo(Producto::class);
    }

    /** @var bool */ 
    public $timestamps = false;
}
