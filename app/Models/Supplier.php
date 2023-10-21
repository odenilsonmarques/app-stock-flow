<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'cnpj',
        'phone',
        'date',
        'invoice',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    // Esse método vai centralizar as responsabilidades de filtrar os itens
    public function search(Array $data, $totalPage)
    {
        return $this->where(function($query) use ($data){
            if(isset($data['name'])){
                // $query->where('cnpj', $data['cnpj']);
                $query->where('name', 'LIKE', $data['name'] . '%');
            }

            if(isset($data['cnpj'])){
                // $query->where('cnpj', $data['cnpj']);
                $query->where('cnpj', 'LIKE', $data['cnpj'] . '%');
            }
        })
        ->paginate($totalPage);
    }
}
