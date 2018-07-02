<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    //
    public function study_programs() {
        return $this->hasMany('App\StudyProgram');
    }
}
