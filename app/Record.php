<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Record extends Model
{
    use SoftDeletes;
    protected $table = 'records';
    protected $primaryKey   = 'id';
    protected $fillable = [
        'name', 'doctor_id', 'date', 'time', 'limit'
    ];

    public static function getRecordNameById($id)
    {
        $record = Record::find($id);
        return $record->name;
    }

    public function doctor()
    {
        return $this->hasOne('App\Doctor', 'doctor_id');
    }
    
}
