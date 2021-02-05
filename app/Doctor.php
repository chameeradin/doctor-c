<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Doctor extends Model
{
    use SoftDeletes;
    protected $table = 'doctors';
    protected $primaryKey   = 'id';
    protected $fillable = [
        'title','first_name', 'last_name','phone', 'gender', 'category_id','user_id', 'ref_no'
    ];


    public static function getDoctorNameById($id)
    {
        $doctor = Doctor::find($id);
        return $doctor->first_name;
    }

    public function record()
    {
        return $this->hasMany('App\Record');
    }

    public function appointments()
    {
        return $this->hasMany('App\Appointment');
    }
}
