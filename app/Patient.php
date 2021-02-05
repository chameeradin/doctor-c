<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patient extends Model
{
    use SoftDeletes;
    protected $table = 'patients';
    protected $primaryKey   = 'id';
    protected $fillable = [
        'title','first_name','last_name','phone', 'gender', 'age','user_id', 'ref_no'
    ];


    public static function getPatientNameById($id)
    {
        $patient = Patient::find($id);
        return $patient->first_name;
    }

    public function appointment()
    {
        return $this->hasMany('App\Appointment');
    }
}
