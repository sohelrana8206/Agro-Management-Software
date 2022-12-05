<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food_purchase extends Model
{
    protected $fillable = [
        'food_inventory_id',
        'food_supplier_name',
        'food_supplier_phone',
        'food_supplier_address',
    ];

    public function food_inventory(){
        return $this->belongsTo('App\Food_inventory','food_inventory_id');
    }
}
