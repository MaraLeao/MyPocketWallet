<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Entrada;

class UserController extends Controller
{
    public function show(string $id): View 
    {
        return view('entrada/show', [
            'entrada' => Entrada::findOrFail($id)
        ]);
    }
}
