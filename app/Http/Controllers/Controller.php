<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Cookie;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function get_total_price()
    {
        $basket = json_decode(Cookie::get('basket'));
        return $basket->total;

    }

    public function get_basket_products()
    {
        $basket = json_decode(Cookie::get('basket'));
        return $basket->products;
    }
}
