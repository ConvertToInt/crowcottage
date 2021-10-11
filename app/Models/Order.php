<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function addresses() {
        return $this->hasMany('App\Models\Addresses');
    }

    public function products() {
        return $this->hasMany('App\Models\Product');
    }
}
