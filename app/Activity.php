<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    //
    protected $fillable = ['name', 'code', 'status', 'implementation_date', 'file', 'content', 'ukm_id'];


    public function ukm() {
        return $this->belongsTo('App\Ukm');
    }

    public function scopePublished($query) {
        return $query->where('published', 1);
    }
}
