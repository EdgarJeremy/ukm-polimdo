<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    //
    protected $fillable = ['name', 'implementation_date', 'place', 'description', 'contact_person', 'file', 'ukm_id'];

    public function ukm() {
        return $this->belongsTo('App\Ukm');
    }
}
