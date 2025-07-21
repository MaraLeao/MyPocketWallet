<?php

namespace App\Http\Controllers;

use App\Http\Requests\DespesaRequest;
use App\Http\Requests\GanhoRequest;
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
        return view('entradas/index', [
            'entradas' => Entrada::all()
        ]);
    }
    public function createGanho(): View
    {
        return view('entrada.create.ganho', [
            'categorias' => Categoria::all(),
            'formapagamentos' => FormaPagamento::all()
        ]);
    }

    public function storeGanho(GanhoRequest $request): RedirectResponse
    {
        Entrada::create($request->validated());

        return redirect('/entradas')->with('success','Entrada criada com sucesso' );
    }

    public function createDespesa(): View
    {
        return view('entrada.create.despesa', [
            'categorias' => Categoria::all(),
            'formapagamentos' => FormaPagamento::all()
        ]);
    }

    public function storeDespesa(DespesaRequest $request): RedirectResponse
    {
        Entrada::create($request->validated());

        return redirect('/entradas')->with('success','Despesa criada com sucesso' );
    }

    public function edit(int $id) : View
    {
        $entrada = Entrada::findOrFail($id);
        return view('entrada/edit', [
            'entrada' => $entrada,
        ]);
    }

    public function updateDespesa(DespesaRequest $request, int $id): RedirectResponse
    {
        $entrada = Entrada::findOrFail($id);
        $entrada->update($request->validated());

        return redirect()->route('entrada.index')->with('success','Entrada atualizada com sucesso' );
    }

    public function updateGanho(GanhoRequest $request, int $id): RedirectResponse
    {
        $entrada = Entrada::findOrFail($id);
        $entrada->update($request->validated());

        return redirect()->route('entrada.index')->with('success','Entrada atualizada com sucesso' );
    }

    public function destroy(int $id): RedirectResponse
    {
        $entrada = Entrada::findOrFail($id);
        $entrada->delete();
        return redirect('/entradas')->with('success','Entrada apagada com sucesso' );
    }
}
