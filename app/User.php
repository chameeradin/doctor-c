<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;

    use SoftDeletes;
    protected $table = 'users';
    protected $primaryKey   = 'id';
    protected $fillable = [
        'title','first_name','last_name', 'email', 'password', 'role_id'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role()
    {
        return $this->belongsTo('App\Role');
    }


    /**
     * @param $role
     * @return bool
     */
    public function hasRole($role)
    {
        if($role = $this->role()->where('slug', $role)->first()) {
            return $role;
        }else {
            return null;
        }
    }

    /**
     * @param $roles
     * @return mixed|null
     */
    public function hasAnyRole($roles)
    {
        if($role = $this->role()->whereIn('slug', $roles)->first()) {
            return $role;
        }else {
            return null;
        }
    }

    public static function getUserNameById($id)
    {
        $users = User::find($id);
        return $users->first_name;
    }

    public function doctor()
    {
        return $this->hasOne('App\Doctor', 'user_id');
    }

    public function patient()
    {
        return $this->hasOne('App\Patient', 'user_id');
    }

}
