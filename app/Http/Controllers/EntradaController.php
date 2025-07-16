<?php

namespace App\Http\Controllers;

use App\Models\Entrada;
use App\Models\Categoria;
use App\Models\FormaPagamento;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EntradaController extends Controller
{
    public function index(string $id): View 
    {
        return view('entrada/index', [
            'index' => Entrada::all()
        ]);
    }
}
