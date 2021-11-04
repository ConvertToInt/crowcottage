<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function get_total_price(Request $request)
    {
        $basket = json_decode($request->cookie('basket'));
        return $basket->total;

    }

    public function get_basket_products(Request $request)
    {
        $basket = json_decode($request->cookie('basket'));
        return $basket->products;
    }
}
