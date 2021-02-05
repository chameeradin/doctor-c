<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $table = 'web_enquiry';
    protected $guarded = ['w_id'];
}
