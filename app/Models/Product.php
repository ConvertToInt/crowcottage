<?php

namespace App\Models;

use App\Http\Traits\SearchArray;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sale;

class Product extends Model
{
    use HasFactory;
    use SearchArray;

    public $fillable = [
        'title',
        'desc',
        'img',
        'price',
    ];

    public function sold()
    {
        return $this->belongsTo('App\Models\Sale');
    }

    public function is_sold()
    {
        return $this->sold()
        ->where('product_id', $this->id)->exists();
    }
}
