<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deliverymen extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'cpf',
    ];

    public function productOutPuts()
    {
        return $this->hasMany(ProductOutPut::class);
    }
}
