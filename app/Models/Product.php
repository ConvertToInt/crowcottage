<?php

namespace App\Models;

use App\Http\Traits\SearchArray;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
