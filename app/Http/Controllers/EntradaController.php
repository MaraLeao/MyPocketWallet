<?php

namespace App\Http\Controllers;

use App\Models\Entrada;
use App\Models\Categoria;
use App\Models\FormaPagamento;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateEntradaRequest;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Redirect;

class EntradaController extends Controller
{
    public function index(): View
    {
        return view('entrada/index', [
            'entradas' => Entrada::all()
        ]);
    }

    public function create(): View
    {
        return view('entrada/create', [
            'categorias' => Categoria::all(),
            'formapagamentos' => FormaPagamento::all()
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'valor' => 'required|integer',
            'categoria_id' => 'required|exists:categorias,id',
            'data' => 'required|date',
            'formapagamento_id' => 'nullable|exists:formapagamentos,id',
            'parcelamento' => 'nullable|integer|gt:0',
            'descricao' => 'nullable|string|max:255',
            'status' => 'required|in:P,N,G',
            'user_id' => 'nullable|exists:users,id',
            'despesa' => 'required|boolean'
        ]);

        Entrada::create($request->all());

        return redirect('/entradas')->with('success','Entrada criada com sucesso' );
    }

    public function edit(int $id) : View
    { 
        $entrada = Entrada::findOrFail($id);
        return view('entrada/edit', [
            'entrada' => $entrada,
        ]);
    }

    public function update(Request $request,int $id): RedirectResponse
    {
        $entrada = Entrada::findOrFail($id);
        $entrada->update($request->validated());

        return redirect()->route('entrada.index')->with('success','Entrada atualizada com sucesso' );
    }
}
