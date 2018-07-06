<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    //
    protected $fillable = ['name', 'file', 'ukm_id'];

    public function ukm() {
        return $this->belongsTo('App\Ukm');
    }
}
