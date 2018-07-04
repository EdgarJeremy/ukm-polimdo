<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //
    protected $fillable = ['name', 'type', 'cash', 'cash_id', 'action_date', 'description', 'file', 'cash_id_from', 'cash_id_to'];

    public function target_cash() {
        return $this->belongsTo('App\Cash', 'cash_id');
    }

    public function transfer_from() {
        return $this->belongsTo('App\Cash', 'cash_id_from');
    }

    public function transfer_to() {
        return $this->belongsTo('App\Cash', 'cash_id_to');
    }
}
