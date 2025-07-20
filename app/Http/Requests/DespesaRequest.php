<?php

namespace App\Http\Requests;

use App\Models\FormaPagamento;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DespesaRequest extends FormRequest
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
                Rule::exists('categorias', 'id')->where('despesa', true)
            ],
            'data' => 'required|date',
            'formapagamento' => 'required|exists:formapagamentos,id',
            'parcelamento' => 'nullable|integer|min:1',
            'status' => 'required|in:P,N',
            'user_id' => 'nullable|exists:users,id',
            'descricao' => 'nullable|string|max:255'

        ];
    }

    public function prepareForValidation()
    {
        $formaPagamentoId = $this->input('formapagamento');

        if ($formaPagamentoId) {
            $formaPagamento = FormaPagamento::findOrFail($formaPagamentoId);
            if($formaPagamento->tipo == 'Saldo') {
                $this->merge(['status' => 'P']);
            }
        }
    }
}
