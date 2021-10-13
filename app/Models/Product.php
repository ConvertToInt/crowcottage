<?php

namespace App\Models;

use App\Http\Traits\SearchArray;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Model\Sale;

class Product extends Model
{
    use HasFactory;
    use SearchArray;

    public $fillable = [
        'title',
        'desc',
        'img',
        'price',
        'sold'
    ];

    public function sold()
    {
        return $this->belongsTo('App\Model\Sale');
    }

    public function is_sold($product)
    {
        return $this->sold()
        ->where('product_id', $product->id)->exists();
    }
}
