<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateSupplier extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        #esse valor por padrão vem false, mas como não vamos trabalhar com acl nessse projeto, é melhor usar o true
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
            'name'=>['required','string','min:3','max:255'],
            'cnpj'=>['required','string'],
            'phone'=>['required','string'],
            'date'=>['required'],
            'invoice'=>['required']
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'O campo nome é obrigatório',
            'name.min'=>'O campo nome deve ter no mínimo 3 caractres',
            'name.max'=>'O campo nome deve ter no maximo 255 caractres',
            'cnpj.required'=>'O campo cnpj é obrigatório',
            'phone.required'=>'O campo telefone é obrigatório',
            'date.required'=>'O campo data é obrigatório',
            'invoice.required'=>'O campo nota fiscal é obrigatório'
        ];
    }
}
