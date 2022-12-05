<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class insemination_company extends Model
{
    protected $fillable = [
        'company_name',
        'company_phone',
        'company_email',
        'company_address',
        'company_representative_name',
        'company_representative_phone',
    ];

    public function bull_info(){
        return $this->hasOne('App\Bull_info');
    }

    public function animal_born_info(){
        return $this->hasOne('App\Animal_born_info');
    }

    public function animal_insemination_info(){
        return $this->hasOne('App\Animal_insemination_info');
    }
}
