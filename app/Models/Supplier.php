<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type_supplier',
        'cpf_cnpj',
        'email',
        'phone',
        'cep',
        'road',
        'identification_number',
        'complement',
        'city',
        'district',
        'invoice',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    // Esse método vai centralizar as responsabilidades de filtrar os itens
    public function search(array $data, $totalPage)
    {
        return $this->where(function ($query) use ($data) {
            if (isset($data['name'])) {
                // $query->where('cnpj', $data['cnpj']);
                $query->where('name', 'LIKE', $data['name'] . '%');
            }

            if (isset($data['cpf_cnpj'])) {
                // $query->where('cnpj', $data['cnpj']);
                $query->where('cpf_cnpj', 'LIKE', $data['cpf_cnpj'] . '%');
            }
        })
            ->paginate($totalPage);
    }
}
