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
}
