<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Model
{
    use SoftDeletes;
    protected $table = 'appointments';
    protected $primaryKey   = 'id';
    protected $fillable = [
        'date', 'time', 'patient_id', 'doctor_id', 'record_id', 'ref_no'
    ];

    public function patient()
    {
        return $this->belongsTo('App\Patient', 'patient_id');
    }

    public function doctor()
    {
        return $this->hasOne('App\Doctor', 'user_id');
    }

}
