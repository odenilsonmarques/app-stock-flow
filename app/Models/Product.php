<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'supplier_id',
        'name',
        'description',
        'amount',
        'confirm_amount',
        'minimum_amount',
    ];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function productOutPuts()
    {
        return $this->hasMany(productOutPut::class);
    }
}
