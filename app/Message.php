<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //
    protected $fillable = ['name', 'nim', 'email', 'phone', 'message', 'ukm_id'];
}
