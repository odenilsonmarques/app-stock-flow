<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateProductOutPut extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'product_id' => ['required'],
            'typeOutPut' => ['required'],
            'amount_outPut' => ['required', 'integer', 'min:1', 'regex:/^\d+$/'],
            'destiny' => ['required', 'string', 'min:3', 'max:255', 'regex:/^[\pL\s]+$/u'],
            'responsible_for_leaving' => ['required', 'string', 'min:5', 'max:255', 'regex:/^[\pL\s]+$/u'],
            'responsible_for_receiving' => ['required', 'string', 'min:5', 'max:255', 'regex:/^[\pL\s]+$/u'],
        ];
    }

    public function messages()
    {
        return [
            'product_id.required' => 'O campo produto é obrigatório',
            'typeOutPut.required' => 'O campo tipo de saída é obrigatório',

            'amount_outPut.required' => 'O campo quantidade é obrigatório',
            'amount_outPut.integer' => 'O campo quantidade deve ser um número inteiro',
            'amount_outPut.regex' => 'O campo quantidade só aceita números inteiros',
            'amount_outPut.min' => 'O campo quantidade deve ter no mínimo 1 valor',

            'destiny.required' => 'O campo orgão/secretaria é obrigatório',
            'destiny.min' => 'O campo orgão/secretaria deve ter no mínimo 3 caracteres',
            'destiny.max' => 'O campo orgão/secretaria deve ter no maximo 255 caracteres',
            'name.regex' => 'O campo orgão/secretaria deve conter apenas letras',

            'responsible_for_leaving.required' => 'O campo responsável pela entrega do produto é obrigatório',
            'responsible_for_leaving.min' => 'O campo responsável pela entrega do produto deve ter no mínimo 5 caracteres',
            'responsible_for_leaving.max' => 'O campo responsável pela entrega do produto deve ter no maximo 255 caracteres',
            'name.regex' => 'O campo responsável pela entrega deve conter apenas letras.',

            'responsible_for_receiving.required' => 'O campo responsável por receber o produto é obrigatório',
            'responsible_for_receiving.min' => 'O campo responsável por receber o produto deve ter no mínimo 5 caracteres',
            'responsible_for_receiving.max' => 'O campo responsável por receber o produto deve ter no maximo 255 caracteres',
            'name.regex' => 'O campo responsável por receber o produto deve conter apenas letras',
        ];
    }
}
