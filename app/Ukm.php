<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ukm extends Model
{
    //
    protected $fillable = ['logo', 'profile', 'logo_meaning', 'vision', 'mission', 'faqs'];

    public function messages() {
        return $this->hasMany('App\Message');
    }
}
