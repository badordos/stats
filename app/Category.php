<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    public function purchasesSum($purchases){

        $purchasesSum = $purchases->filter(function ($value){
            return $value->category_id == $this->id;
        })->sum('cost');

        return $purchasesSum;
    }
}
