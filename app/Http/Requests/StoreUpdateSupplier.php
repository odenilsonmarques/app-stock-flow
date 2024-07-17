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
            'name' => ['required', 'string', 'min:3', 'max:255', 'unique:suppliers'],
            'type_supplier' => ['required'],
            'cpf_cnpj' => ['required', 'string', 'unique:suppliers'],
            'email' => ['nullable', 'string', 'unique:suppliers'],
            'phone' => ['required', 'string', 'min:12', 'unique:suppliers'],
            'cep' => ['nullable', 'string'],
            'roud' => ['nullable', 'string'],
            'identification_number' => ['nullable', 'string'],
            'complement' => ['nullable', 'string'],
            'city' => ['nullable', 'string'],
            'district' => ['nullable', 'string'],
            'invoice' => ['image', 'max:1024'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O campo nome é obrigatório',
            'name.min' => 'O campo nome deve ter no mínimo 3 caracteres',
            'name.max' => 'O campo nome deve ter no maximo 255 caracteres',
            'name.unique' => 'Já existe um fornecedor cadastrado com esse nome',
            'type_supplier.required' => 'O campo tipo de fornecedor é obrigatório',
            'cpf_cnpj.required' => 'O campo numero do documento é obrigatório',
            'cpf_cnpj.unique' => 'O numero do documento informado já está cadastrado',
            // 'cpf_cnpj.min' => 'O campo numero do documento deve ter no mínimo 11 caracteres',
            // 'cpf_cnpj.max' => 'O campo numero do documento deve ter no maximo 15 caracteres',
            'email.unique' => 'O cnpj informado já está cadastrado',
            'phone.required' => 'O campo telefone é obrigatório',
            'phone.unique' => 'O telefone informado já está cadastrado',
            'phone.min' => 'O telefone deve ter pelo menos 12 dígitos',
            'road.min' => 'O campo rua deve ter no mínimo 1 caractere',
            'road.max' => 'O campo rua deve ter no maximo 255 caracteres',
            'identification_number.min' => 'O campo numero de identificação deve ter no minimo 1 caractere',
            'identification_number.max' => 'O campo numero de identificação deve ter no maximo 5 caracteres',
            'complement.min' => 'O campo complemento deve ter no minimo 1 caractere',
            'complement.max' => 'O campo complement deve ter no maximo 255 caracteres',
            'city.min' => 'O campo cidade deve ter no minimo 1 caractere',
            'ciy.max' => 'O campo cidade deve ter no maximo 255 caracteres',
            'district.min' => 'O campo bairro deve ter no minimo 1 caractere',
            'district.max' => 'O campo bairro deve ter no maximo 255 caracteres',
            'invoice.image' => 'O campo nota fiscal deve uma imagem e ter no máximo :1024 kb',
        ];
    }
}
