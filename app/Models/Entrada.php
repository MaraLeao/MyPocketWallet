<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


/**
 * @property-read \App\Models\Categoria|null $categoria
 * @property-read \App\Models\FormaPagamento|null $formaPagamento
 * @property-read \App\Models\User|null $usuario
 * @method static \Illuminate\Database\Eloquent\Builder|Entrada newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Entrada newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Entrada query()
 * @mixin \Eloquent
 */
class Entrada extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'valor',
        'categoria_id',
        'data',
        'formapagamento_id',
        'parcelamento',
        'descricao',
        'status',
        'user_id',
        'despesa'
    ];

    public function categoria(): BelongsTo {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }

    public function formaPagamento(): BelongsTo {
        return $this->belongsTo(FormaPagamento::class, 'formapagamento_id');
    }

    public function usuario(): BelongsTo {
        return $this->belongsTo(User::class, 'user_id');
    }


    protected $casts = [
        'valor' => 'int',
        'data' => 'date',
        'parcelamento' => 'int',
        'despesa' => 'bool'
    ];
}
