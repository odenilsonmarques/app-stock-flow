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
        'uuid',
        'product_number',
        'name',
        'description',
        'amount',
        'confirm_amount',
        'minimum_amount',
    ];


    // protected static function boot()
    // {
    //     parent::boot();

    //     static::creating(function($product){
    //         $product->uuid = ()
    //     })
    // }


    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function productOutPuts()
    {
        return $this->hasMany(productOutPut::class);
    }

     // Esse método vai centralizar as responsabilidades de filtrar os itens
     public function searchProduct(Array $data, $totalPage)
     {
         return $this->where(function($query) use ($data){
             if(isset($data['name'])){
                 // $query->where('name', $data['name']);
                 $query->where('name', 'LIKE', $data['name'] . '%');
             }
         })
 
         ->paginate($totalPage);
     }
}
