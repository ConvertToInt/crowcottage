<?php

namespace App\Models;

use App\Http\Traits\SearchArray;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sale;
use App\Models\ProductPhoto;

class Product extends Model
{
    use HasFactory;

    public $fillable = [
        'title',
        'desc',
        'img',
        'price',
    ];

    public function sold()
    {
        return $this->hasOne(Sale::class);
    }

    public function is_sold()
    {
        return $this->sold()
        ->where('product_id', $this->id)->exists();
    }

    public function images()
    {
        return $this->hasMany('App\Models\ProductPhoto');
    }

    public function thumbnail_img()
    {
        return $this->hasOne('App\Models\ProductPhoto')
        ->where('is_thumbnail', '1');
    }

    public function secondary_img()
    {
        return $this->hasOne('App\Models\ProductPhoto')
        ->where('is_thumbnail', '0');
    }
}
