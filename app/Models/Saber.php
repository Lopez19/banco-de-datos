<?php

namespace App\Models;

use Awcodes\Curator\Models\Media;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Saber extends Model
{

    use HasFactory;

    protected $table = 'saberes';

    protected $fillable = [
        'titulo',
        'slug',
        'descripcion',
        'area_tematica_id',
        'media_id',
        'format_id',
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

    public function format(): BelongsTo
    {
        return $this->belongsTo(Format::class, 'format_id');
    }

    public function media(): BelongsTo
    {
        return $this->belongsTo(Media::class, 'media_id');
    }
}
