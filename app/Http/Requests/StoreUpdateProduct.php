<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateProduct extends FormRequest
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
            'supplier_id'=>['required'],
            'name'=>['required','string','min:3','max:255','alpha'], //o parametro alpha indica que o valor da string deve conter apenas letras
            'amount'=>['required','integer','min:1','regex:/^\d+$/'],
            'confirm_amount'=>['required','integer','min:1','regex:/^\d+$/'],
            'minimum_amount'=>['required','integer','min:1','regex:/^\d+$/']
        ];
    }

    public function messages()
    {
        return [
            'supplier_id.required'=>'O campo fornecedor é obrigatório',

            'name.required'=>'O campo produto é obrigatório',
            'name.min'=>'O campo produto deve ter no mínimo 3 caractres',
            'name.max'=>'O campo produto deve ter no maximo 255 caractres',
            'name.alpha' => 'O campo produto deve conter apenas letras',

            'amount.required' => 'O campo quantidade é obrigatório',
            'amount.integer' => 'O campo quantidade deve ser um número inteiro',
            'amount.regex' => 'O campo quantidade só aceita números inteiros',
            'amount.min'=>'O campo quantidade deve ter no mínimo 1 valor',

            'confirm_amount.required' => 'O campo confirme a quantidade é obrigatório',
            'confirm_amount.integer' => 'O campo confirme a quantidade deve ser um número inteiro',
            'confirm_amount.regex' => 'O campo confirme a quantidade só aceita números inteiros',
            'confirm_amount'=>'O campo confirme a quantidade deve ter no mínimo 1 valor',

            'minimum_amount.required' => 'O campo quantidade minima é obrigatório',
            'minimum_amount.integer' => 'O campo quantidade minima deve ser um número inteiro',
            'minimum_amount.regex' => 'O campo quantidade minima só aceita números inteiros',
            'minimum_amount'=>'O campo quantidade minima deve ter no mínimo 1 valor',


        ];
    }
}
