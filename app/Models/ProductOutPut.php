<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class ProductOutPut extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'deliverymen_id',
        'product_id',
        'amount_outPut',
        'typeOutPut',
        'destiny',
        'responsible_for_leaving',
        'responsible_for_receiving',
    ];

    

    public function product()
    {
        return $this->belongsTo(Product::class);
    }  
    
    public function deliverymen()
    {
        return $this->belongsTo(Deliverymen::class);
    } 
    

    // Esse método vai centralizar as responsabilidades de filtrar os itens
    public function searchProductOutPut(array $data, $totalPage)
    {
        return $this->where(function ($query) use ($data) {
            if (isset($data['destiny'])) {
                $query->where('destiny', 'LIKE', $data['destiny'] . '%');
            }

            // depois tentar ver outra forma de fazer essa busca
            if (isset($data['name'])) {
                $query->whereHas('product', function ($subQuery) use ($data) {
                    $subQuery->where('name', 'LIKE', $data['name'] . '%');
                });
            }
        })
            ->paginate($totalPage);
    }
}
