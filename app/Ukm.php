<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ukm extends Model
{
    //
    protected $fillable = ['name', 'logo', 'profile', 'logo_meaning', 'vision', 'mission', 'faqs', 'organization_chart', 'registration', 'active'];

    public function messages() {
        return $this->hasMany('App\Message');
    }
}
