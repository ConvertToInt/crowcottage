<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    public $fillable = [
        'firstname',
        'surname',
        'company',
        'phone',
        'address',
        'apartment',
        'city',
        'country',
        'province',
        'postcode'
    ];

    public function order() {
        return $this->belongsTo('App\Models\Order', 'shipping_address_id');
    }
}
