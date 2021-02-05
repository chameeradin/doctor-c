<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{

    use SoftDeletes;
    protected $table = 'categories';
    protected $guarded = ['id'];

    public static function getCategoryNameById($id)
    {
        $category = Category::find($id);
        return $category->name;
    }
}
