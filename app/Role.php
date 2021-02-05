<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * @var array
     */
    protected $guarded = [];

    public static function getRoleNameById($id)
    {
        $role = Role::find($id);
        return $role->name;
    }

}
