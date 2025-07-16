<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(string $id): View 
    {
        return view('entrada/show', [
            'entrada' => Entrada::findOrFail($id)
        ]);
    }
}
