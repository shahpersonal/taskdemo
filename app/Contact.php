<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'name', 'email', 'message'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

}
