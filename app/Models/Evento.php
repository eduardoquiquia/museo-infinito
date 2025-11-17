<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Evento extends Model
{
    use HasFactory;

    const UBICACIONES = ['sala_principal', 'auditorio', 'jardin', 'sala_exposiciones'];
    const CATEGORIAS = ['concierto', 'exposicion', 'taller', 'conferencia'];
    const ESTADOS = ['activo', 'inactivo', 'cancelado'];

    /** @var list<string> */
    protected $fillable = [
        'nombre',
        'descripcion',
        'fecha',
        'hora',
        'ubicacion',
        'categoria',
        'precio',
        'capacidad',
        'ruta_imagen',
        'estado'
    ];

    /** @return array<string, */
    protected function casts(): array
    {
        return [
            'fecha' => 'date',
            'precio' => 'decimal:2',
            'capacidad' => 'integer',
        ];
    }

    public function entradas()
    {
        return $this->morphMany(Entrada::class, 'origen');
    }

    /** @var bool */ 
    public $timestamps = false;
}
