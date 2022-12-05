<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Animal_feeding extends Model
{
    protected $fillable = [
        'animal_profile_id',
        'food_inventory_id',
        'food_quantity',
        'food_cost',
        'feeding_time',
        'employee_id',
    ];

    public function animal_profile(){
        return $this->belongsTo('App\Animal_profile','animal_profile_id');
    }

    public function food_inventory(){
        return $this->belongsTo('App\Food_inventory','food_inventory_id');
    }

    public function employee(){
        return $this->belongsTo('App\Employee','employee_id');
    }
}
