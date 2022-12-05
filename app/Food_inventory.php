<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food_inventory extends Model
{
    protected $fillable = [
        'food_name',
        'food_quality',
        'food_quantity',
        'food_cost',
        'food_status',
    ];

    public function yield_info(){
        return $this->hasOne('App\Yield_info');
    }

    public function food_purchase(){
        return $this->hasOne('App\Food_purchase');
    }

    public function animal_feeding(){
        return $this->hasOne('App\Animal_feeding');
    }
}
