<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Entrada;
use App\Models\FormaPagamento;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class FPController extends Controller
{
    public function index(): View
    {
        return view('/formapagamentos/index', [
            'formapagamentos' => FormaPagamento::all()
        ]);
    }

    public function create(): View
    {
        return view('/formapagamentos/create', [
            'formapagamentos' => FormaPagamento::all()
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        FormaPagamento::create($request->validate(['tipo' => 'required|string|max:250']));
        return redirect('/formapagamentos')->with('success','Forma de pagamento criada com sucesso' );
    }

    public function edit(int $id): View
    {
        $formapagamento = FormaPagamento::findOrFail($id);

        if($formapagamento->tipo == 'Saldo') {
            return redirect('/formapagamentos')->with('error', 'Essa forma de pagamento nao pode ser editada');
        }

        return view('/formapagamentos/edit', [
            'formapagamentos' => $formapagamento
        ]);
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        $formapagamento = FormaPagamento::findOrFail($id);

        $formapagamento->update($request->validate(['tipo' => 'required|string|max:250']));

        return redirect('/formapagamentos')->with('success','Forma de pagamento editada com sucesso' );
    }

    public function destroy(int $id): RedirectResponse
    {
        $formapagamento = FormaPagamento::findOrFail($id);

        if($formapagamento->tipo == 'Saldo') {
            return redirect('/formapagamentos')->with('error', 'Essa forma de pagamento nao pode ser excluida');
        }
        $formapagamento->delete();

        return redirect('/formapagamentos');
    }

}
