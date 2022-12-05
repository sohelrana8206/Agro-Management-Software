<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Animal_profile extends Model
{
    protected $fillable = [
        'animal_name',
        'animal_type',
        'animal_registration_no',
        'animal_birth_date',
        'animal_age',
        'animal_gender',
        'animal_current_location',
        'animal_height',
        'animal_weight',
        'animal_color',
        'animal_breed_id',
        'animal_pic',
        'animal_teeth_availability',
        'user_id',
    ];

    public function animal_born_info(){
        return $this->hasOne('App\Animal_born_info');
    }

    public function animal_feeding(){
        return $this->hasOne('App\Animal_feeding');
    }

    public function animal_health(){
        return $this->hasOne('App\Animal_health');
    }

    public function animal_insemination_info(){
        return $this->hasOne('App\Animal_insemination_info');
    }

    public function animal_inventory(){
        return $this->hasOne('App\Animal_inventory');
    }

    public function purchase(){
        return $this->hasOne('App\Purchase');
    }

    public function animal_breed(){
        return $this->belongsTo('App\Animal_breed','animal_breed_id');
    }

    public function user(){
        return $this->belongsTo('App\User','user_id');
    }
}


