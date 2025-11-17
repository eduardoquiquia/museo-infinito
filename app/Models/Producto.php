<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Producto extends Model
{
    use HasFactory;

    const CATEGORIAS = ['entradas', 'platos principales', 'acompañamientos', 'postres', 'bebidas'];
    const ESTADOS = ['disponible', 'agotado', 'inactivo'];

    /** @var list<string> */
    protected $fillable = [
        'nombre',
        'descripcion',
        'categoria',
        'precio',
        'ruta_imagen',
        'estado'
    ];

    /** @return array<string, */
    protected function casts(): array
    {
        return [
            'precio' => 'decimal:2'
        ];
    }

    public function detalles(): HasMany
    {
        return $this->hasMany(PedidoDetalle::class);
    }

    /** @var bool */ 
    public $timestamps = false;
}
