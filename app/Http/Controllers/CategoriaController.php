<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Categoria;
use App\Models\Entrada;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index(): View
    {
        return view('categorias.index', [
            'categorias' => Categoria::all()
        ]);
    }

    public function create(): View
    {
        return view('categorias.create');
    }

    public function store(Request $request): RedirectResponse
    {
        Categoria::create($request->validate([
            'nome' => 'required|String|max:255',
            'despesa' => 'required|boolean'
            ]));
        return redirect('/categorias')->with('success', 'Categoria cadastrada com sucesso!');
    }

    public function edit(int $id): View
    {
        $categoria = Categoria::findOrFail($id);
        return view('categorias.edit', [
            'categoria' => $categoria
        ]);
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->update($request->validate([
            'nome' => 'required|String|max:255',
            'despesa' => 'required|boolean'
            ])
        );

        return redirect('/categorias')->with('success', 'Categoria atualizada com sucesso!');
    }

    public function destroy(int $id): RedirectResponse
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->delete();
        return redirect('/categorias')->with('success', 'Categoria deletada com sucesso!');
    }
}
