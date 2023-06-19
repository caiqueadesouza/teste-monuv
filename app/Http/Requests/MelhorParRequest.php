<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MelhorParRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'comerciais' => 'required',
            'intervalo' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'comerciais.required' => 'Campo Comerciais Obrigatório!',
            'intervalo.required' => 'Campo Intervalo Obrigatório!',
        ];
    }
}