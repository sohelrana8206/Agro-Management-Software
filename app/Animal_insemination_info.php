<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Animal_insemination_info extends Model
{
    protected $fillable = [
        'animal_profile_id',
        'insemination_date',
        'insemination_company_id',
        'bull_info_id',
        'insemination_status_birth_status',
    ];

    public function animal_profile(){
        return $this->belongsTo('App\Animal_profile','animal_profile_id');
    }

    public function insemination_company(){
        return $this->belongsTo('App\Insemination_company','insemination_company_id');
    }

    public function bull_info(){
        return $this->belongsTo('App\Bull_info','bull_info_id');
    }
}
