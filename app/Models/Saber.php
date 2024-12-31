<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Saber extends Model
{
    protected $table = 'saberes';
    protected $fillable = [
        'titulo',
        'descripcion',
        'area_tematica_id',
        'formato',
        'palabras_clave',
        'autor',
        'enlace_adicional'
    ];

    protected $casts = [
        'palabras_clave' => 'array',
    ];

    public function areaTematica(): BelongsTo
    {
        return $this->belongsTo(AreaTematica::class, 'area_tematica_id', 'id');
    }
}
