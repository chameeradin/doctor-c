<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    protected $table = 'prescriptions';
    protected $primaryKey   = 'id';
    protected $fillable = [
        'ref_no', 'appointment_id','doctor_id','patient_id', 'medicine'
    ];

    public function appointment()
    {
        return $this->hasOne('App\Appointment', 'appointment_id');
    }

    public static function getAppointmentById($id)
    {
        $appointments = Appointment::find($id);
        return $appointments->patient_id;
    }
}
