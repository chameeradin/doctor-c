<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inquiry extends Model
{
    use SoftDeletes;
    protected $table = 'web_enquiry';
    protected $primaryKey   = 'id';
    protected $fillable = [
        'name','email', 'message'
    ];
}
