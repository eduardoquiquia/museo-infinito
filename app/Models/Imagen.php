<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Imagen extends Model
{
    use HasFactory;

    /** @var list<string> */
    protected $fillable = [
        'ruta',
        'descripcion',
    ];

    public function imageable(): MorphTo
    {
        return $this->morphTo();
    }

    /** @var bool */ 
    public $timestamps = false;
}
