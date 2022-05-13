<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class ProductPhoto extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'path', 'thumbnail'];

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }
}
