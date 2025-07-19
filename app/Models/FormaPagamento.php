<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static \Illuminate\Database\Eloquent\Builder|FormaPagamento newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FormaPagamento newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FormaPagamento query()
 * @mixin \Eloquent
 */
class FormaPagamento extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipo'
    ];
}
