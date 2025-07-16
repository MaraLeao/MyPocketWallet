<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
    use HasFactory;
    use HasUuids;

    protected $fillable = [
        'titulo',
        'valor',
        'categoria',
        'data',
        'formapagamento',
        'parcelamento',
        'descricao',
        'status',
        'usuario',
        'despesa'
    ];

    public function categoria(): BelongsTo {
        return $this->belongsTo(Categoria::class, 'categoria');
    }

    public function formaPagamento(): BelongsTo {
        return $this->belongsTo(FormaPagamento::class, 'formapagamento');
    }

    protected $casts = [
        'valor' => 'int',
        'data' => 'date',
        'parcelamento' => 'int',
        'status' => 'char',
        'despesa' => 'bool'
    ];
}
