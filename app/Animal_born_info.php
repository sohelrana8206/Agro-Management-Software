<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Animal_born_info extends Model
{
    protected $fillable = [
        'animal_profile_id',
        'animal_born_type',
        'animal_maturity',
        'animal_mother_profile_id',
        'animal_estimated_price',
        'animal_born_status',
        'animal_physician_id',
        'insemination_company_id',
        'bull_info_id',
    ];

    public function animal_profile(){
        return $this->belongsTo('App\Animal_profile','animal_profile_id');
    }

    public function animal_physician(){
        return $this->belongsTo('App\Animal_physician','animal_physician_id');
    }

    public function insemination_company(){
        return $this->belongsTo('App\Insemination_company','insemination_company_id');
    }
}
