<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Yield_info extends Model
{
    protected $fillable = [
        'food_inventory_id',
        'yield_name',
        'yield_location',
        'yield_size',
    ];

    public function food_inventory(){
        return $this->belongsTo('App\Food_inventory','food_inventory_id');
    }

    public function yield_purchase_info(){
        return $this->hasOne('App\Yield_purchase_info');
    }

    public function yield_rent_info(){
        return $this->hasOne('App\Yield_rent_info');
    }
}
