<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public $fillable = [
        'email',
        'shipping_address_id',
        'billing_address_id',
        'total_price',
        'delivery_method',
        'shippping_charge'
    ];

    public function shipping_address() {
        return $this->hasOne('App\Models\Address', 'id', 'shipping_address_id');
    }

    public function billing_address(){
        return $this->hasOne('App\Models\Address', 'id', 'billing_address_id');
    }

    public function sales() {
        return $this->hasMany('App\Models\Sale', 'order_id');
    }

    public function products()
    {
        // return $this->hasManyThrough(
        //     'App\Models\Product', 
        //     'App\Models\Sale', 
        //     'order_id',
        //     'id',
        //     'id',
        //     'id' );

        // get sales and their associated products


    }
}
