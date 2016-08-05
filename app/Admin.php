<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $guard = "admins";

    protected $guarded = ['id'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','username', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];

    public function getRememberToken()
    {
        return '';
    }

    public function setRememberToken($value)
    {
    }

    public function getRememberTokenName()
    {
        // just anything that's not actually on the model
        return 'trash_attribute';
    }

    /**
     * Fake attribute setter so that Guard doesn't complain about
     * a property not existing that it tries to set.
     *
     * Does nothing, obviously.
     */
    public function setTrashAttributeAttribute($value)
    {
    }
}
