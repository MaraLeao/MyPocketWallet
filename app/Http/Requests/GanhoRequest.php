<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class GanhoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'titulo' => 'required|string|max:255',
            'valor' => 'required|integer|min:0',
            'categoria' => [
                'required',
                Rule::exists('categorias', 'id')->where('despesa', false)
                ],
            'data' => 'required|date',
            'status' => 'required|in:G',
            'user_id' => 'nullable|exists:users,id',
            'descricao' => 'nullable|string|max:255'
        ];
    }
}
