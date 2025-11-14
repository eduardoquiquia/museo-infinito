<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Pago extends Model
{
    use HasFactory;

    /** @var list<string> */
    protected $fillable = [
        'user_id',
        'fecha',
        'monto',
        'estado',
    ];

    /** @return array<string, */
    protected function casts(): array
    {
        return [
            'user_id' => 'integer',
            'monto' => 'decimal:2',
            'fecha' => 'datetime',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function origen(): MorphTo
    {
        return $this->morphTo();
    }

    /** @var bool */ 
    public $timestamps = false;
}
