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
        'price',
        'url',
        'height',
        'width'
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
        return $this->hasMany('App\Models\Image');
    }

    public function primary_thumbnail_img()
    {
        return $this->hasOne('App\Models\Image')
        ->where('is_thumbnail', '1')
        ->where('position', '1');
    }

    public function primary_orig_img()
    {
        return $this->hasOne('App\Models\Image')
        ->where('is_thumbnail', '0')
        ->where('position', '1');
    }

    public function secondary_thumbnail_img()
    {
        return $this->hasOne('App\Models\Image')
        ->where('is_thumbnail', '1')
        ->where('position', '2');
    }

    public function secondary_orig_img()
    {
        return $this->hasOne('App\Models\Image')
        ->where('is_thumbnail', '0')
        ->where('position', '2');
    }
}
