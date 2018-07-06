<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    //
    protected $fillable = ['full_name', 'nim', 'semester', 'generation', 'phone', 'address', 'reason', 'hobbies', 'ukm_id', 'major_id', 'study_program_id', 'approved'];

    public function ukm() {
        return $this->belongsTo('App\Ukm');
    }

    public function major() {
        return $this->belongsTo('App\Major');
    }

    public function study_program() {
        return $this->belongsTo('App\StudyProgram');
    }

}
