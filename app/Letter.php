<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Letter extends Model
{
    //
    protected $fillable = ['name', 'file', 'user_id'];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function visibility() {
        return $this->hasOne('App\Visibility');
    }

    public function visibility_users() {
        return $this->hasManyThrough('App\VisibilityUser', 'App\Visibility');
    }

}
