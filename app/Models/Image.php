<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    public $fillable = [
        'product_id',
        'path',
        'position',
        'is_thumbnail',
    ];

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }
}
