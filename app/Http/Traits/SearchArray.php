<?php

namespace App\Http\Traits;

trait SearchArray {

    public function searchArray($products, $product){

        $contains = 0;

        foreach ($products as $item) { //check if already got item in basket
            if ($item->id == $product->id) {
                $contains = 1;
                break;
            } 
        }

        return $contains;
    }
}