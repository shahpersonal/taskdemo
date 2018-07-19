<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name', 'name_arb', 'url' ,'description'
    ];

    public function categories()
    {
        return $this->hasMany('App\Category','parent_id');
    }
}
