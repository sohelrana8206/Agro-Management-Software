<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $fillable = [
        'animal_profile_id',
        'purchase_date',
        'purchase_price',
    ];

    public function animal_profile(){
        return $this->belongsTo('App\Animal_profile','animal_profile_id');
    }

    public function farmer(){
        return $this->hasOne('App\Farmer');
    }

    public function hut_bazar(){
        return $this->hasOne('App\Hut_bazar');
    }

    public function agent(){
        return $this->hasOne('App\Agent');
    }
}
