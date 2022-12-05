<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Animal_inventory extends Model
{
    protected $fillable = [
        'animal_profile_id',
        'estimated_price',
        'animal_status',
        'collection_type',
        'user_id',
    ];

    public function animal_profile(){
        return $this->belongsTo('App\Animal_profile','animal_profile_id');
    }

    public function user(){
        return $this->belongsTo('App\User','user_id');
    }
}
