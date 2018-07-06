<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VisibilityUser extends Model
{
    //
    protected $fillable = ['visibility_id', 'user_id'];

    public function visibility() {
        return $this->belongsTo('App\Visibility');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }
}
