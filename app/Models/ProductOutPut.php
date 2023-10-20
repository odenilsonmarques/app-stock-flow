<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class ProductOutPut extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'product_id',
        'amount_outPut',
        'date_outPut',
        'typeOutPut',
        'destiny',
        'responsible_for_leaving',
        'responsible_for_receiving',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Esse método vai centralizar as responsabilidades de filtrar os itens
    public function searchProductOutPut(Array $data, $totalPage)
    {
        return $this->where(function($query) use($data){
            if(isset($data['destiny'])){
                $query->where('destiny', 'LIKE', $data['destiny'] . '%');
            }
        })
        ->paginate($totalPage);
    }

}
