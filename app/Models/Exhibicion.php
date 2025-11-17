<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exhibicion extends Model
{
    use HasFactory;

    const CATEGORIAS = ['arqueologia', 'historia', 'fossiles', 'arte', 'antiguedades'];

    /** @var list<string> */
    protected $fillable = [
        'titulo',
        'descripcion',
        'categoria',
        'ruta_imagen_360',
        'periodo',
        'fecha_descubrimiento',
        'lugar_hallazgo',
        'descripcion_detallada',
        'destacada'
    ];

    /** @return array<string, */
    protected function casts(): array
    {
        return [
            'fecha_descubrimiento' => 'date',
            'destacada' => 'boolean',
        ];
    }

    public function imagenes()
    {
        return $this->morphMany(Imagen::class, 'imageable');
    }

    /** @var bool */ 
    public $timestamps = false;
}
