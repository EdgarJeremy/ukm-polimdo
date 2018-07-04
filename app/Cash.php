<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cash extends Model
{
    //
    protected $fillable = ['name', 'initial_balance', 'description', 'ukm_id', 'balance'];

    public function ukm() {
        return $this->belongsTo('App\Ukm');
    }

    public function transactions() {
        return $this->hasMany('App\Transaction');
    }
}
