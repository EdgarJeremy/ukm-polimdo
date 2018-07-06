<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visibility extends Model
{
    //
    protected $fillable = ['type', 'letter_id'];

    public function letter() {
        return $this->belongsTo('App\Letter');
    }

    public function visibility_users() {
        return $this->hasMany('App\VisibilityUser');
    }
}
