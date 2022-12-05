<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bull_info extends Model
{
    protected $fillable = [
        'bull_name',
        'bull_registration_number',
        'insemination_company_id',
    ];

    public function insemination_company(){
        return $this->belongsTo('App\Insemination_company','insemination_company_id');
    }

    public function animal_insemination_info(){
        return $this->hasOne('App\Animal_insemination_info');
    }
}
