<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Porcao extends Model
{
    use HasFactory;

    protected $table = 'porcoes';

    protected $fillable = [
        'descricao',
        'peso',
        'alimento_id',
    ];

    protected $casts = [
        'peso' => 'decimal:2',
    ];

    public function alimento()
    {
        return $this->belongsTo(Alimento::class);
    }

    // Métodos para calcular valores nutricionais da porção
    public function getCaloriasAttribute()
    {
        return ($this->alimento->calorias * $this->peso) / 100;
    }

    public function getProteinasAttribute()
    {
        return ($this->alimento->proteinas * $this->peso) / 100;
    }

    public function getCarboidratosAttribute()
    {
        return ($this->alimento->carboidratos * $this->peso) / 100;
    }

    public function getGordurasAttribute()
    {
        return ($this->alimento->gorduras * $this->peso) / 100;
    }

    public function getFibrasAttribute()
    {
        return ($this->alimento->fibras * $this->peso) / 100;
    }
}