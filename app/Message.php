<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //
    protected $fillable = ['name', 'nim', 'email', 'phone', 'message', 'ukm_id'];

    public function ukm() {
        return $this->belongsTo('App\Ukm');
    }
}
