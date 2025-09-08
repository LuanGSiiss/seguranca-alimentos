<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alimento extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'categoria',
        'marca',
        'calorias',
        'proteinas',
        'carboidratos',
        'gorduras',
        'fibras',
        'observacoes',
    ];

    protected $casts = [
        'calorias' => 'decimal:2',
        'proteinas' => 'decimal:2',
        'carboidratos' => 'decimal:2',
        'gorduras' => 'decimal:2',
        'fibras' => 'decimal:2',
    ];

    public function porcoes()
    {
        return $this->hasMany(Porcao::class);
    }
}