<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account_head extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'account_title',
        'account_type_id',
        'create_user',
        'status',
    ];

    public function get_accounts_type(){
        return $this->belongsTo('App\Account_type','account_type_id');
    }

    public function transaction(){
        return $this->hasOne('App\Transaction');
    }
}
